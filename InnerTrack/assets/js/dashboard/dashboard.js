$(document).ready(function () {

    var element = document.getElementById('map');
    element.style = 'height:530px;border-radius:.50rem;';
    var map = L.map(element);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var target = L.latLng(-22.217478,-49.657750 );
    map.setView(target, 12)
   
    
    BuscaRegistrosProDashboard();
    function onMapClick(e) {
        marker = new L.marker(e.latlng, {draggable:'true'});
        marker.on('dragstart', function(event){
            console.log('soltou');
            
          var marker = event.target;
          var position = marker.getLatLng(); 
        
            marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
            $(this).on('dragend',function(){
                let position = this.getLatLng()
                map.panTo(new L.LatLng(position.lat, position.lng))

            })
        });
        map.addLayer(marker);
      };
      
      map.on('click', onMapClick);
    // motando mapa
    $.ajax({
        method: "get",
        url: "dashboard/localizacao",
        dataType: "JSON",
        success: function (data) {
            detalhes_modal(data)
             
            if(data.length>=1){
                for(var i = 0 in data){
                    dropMarkers(data[i]);
                    let layers_marker = addMarker(map,data[i]);
                    layers_marker.addTo(map);
                    add_descricao_do_marker(layers_marker,data[i]);
                }
                ZoomMarker(map);
                fitBound(map,data)
            }
        }
    });
    function fitBound(map,data){
        var lats = [];
        for(var i in data){
            lats.push(L.latLng(data[i].lon, data[i].lat))
        }
        
        return map.fitBounds(lats);
    }
    function add_descricao_do_marker(variavel,data){
        var icon = (data.ult_eve_ignicao == '1')?'<i class="fas fa-key text-success"></i> <strong class="text-success">ON</strong>':'<i class="fas fa-key text-danger"></i> <strong class="text-danger">OFF</strong>';
       
        variavel.bindPopup("<strong>Modelo : </strong><strong class='text-primary'>"+data.rastreado+"</strong><br/>\
                            <strong>Usuario : </strong>"+data.usuario+"<br/>\
                            <strong>Ignição : "+icon+"</strong><br/>\
                            <strong>Velocidade : </strong>"+data.ult_eve_velocidade+" Km/h<br/>\
                            <span data-id='"+data.ult_eve_id+"' class='triger text-primary'>\
                                Detalhes\
                            </span>").openPopup();
    }
    
    function detalhes_modal(data){
        $(document).on('click','.triger',function () {
            let id = $(this).attr('data-id');
            $('#detalhes_do_marker').html('');
            for(var i = 0 in data){
                if(data[i].ult_eve_id == id){
                    var ignicao = (data[i].ult_eve_ignicao == '1')?'<i class="text-success fas fa-key"></i>':'<i class="text-danger fas fa-key"></i>';
                    var gps = (data[i].ult_eve_gps == '1')?'<i class="text-success fas fa-key"></i>':'<i class="text-danger fas fa-key"></i>';
                    var gprs = (data[i].ult_eve_gprs == '1')?'<i class="text-success fas fa-key"></i>':'<i class="text-danger fas fa-key"></i>';
                    $('#detalhes_do_marker').append(
                        '<tr class="preto">\
                            <td>'+data[i].rastreado+'</td>\
                            <td>'+data[i].equipamento+'</td>\
                            <td>'+data[i].usuario+'</td>\
                            <td>long: '+data[i].lon+'<br/>lat: '+data[i].lat+'</td>\
                            <td>'+data[i].ult_eve_velocidade+' Km/h</td>\
                            <td>'+data[i].ult_eve_data_gps+'</td>\
                            <td>'+ignicao+'</td>\
                            <td>'+gps+'</td>\
                            <td>'+gprs+'</td>\
                        </tr>'
                    ) 
                }
            }
            $('#exampleModal').modal('show');
         })
    }
    function addMarker(map,data){
        var tipo = "";
        var cor = (data.ult_eve_ignicao == '1')?'green':'red';
        switch (data.ras_tipo) {
            case 'Pessoa':
                tipo = 'fas fa-user fa-2x';
                break;
        
            case 'Caminhão':
                tipo = 'fas fa-truck fa-2x';
                break;
            case 'Bicicleta':
                tipo = 'fas fa-bicycle fa-2x';
                break;
            case 'Carro':
                tipo = 'fas fa-car fa-2x';
                break;
            case 'Moto':
                tipo = 'fas fa-motorcycle fa-2x';
                break;
        }
              
        var target = L.latLng(data.lon,data.lat);
        map.setView(target, 12);
        return L.marker(target,{icon: L.AwesomeMarkers.icon({icon: tipo, markerColor: cor, prefix: 'fa',})})
        
    }
    function BuscaRegistrosProDashboard(){
        
        $.ajax({
            method: "get",
            url: "dashboard/Resumos",
            dataType: "JSON",
            success: function (data) {
                var label = [];
                var valores = [];
                for(var i in data){
                    $('#'+data[i].tabela).text(data[i].dados.length+' Cadastrados')
                    label.push(data[i].tabela.toUpperCase());
                    valores.push(data[i].dados.length)
                }
                Graficos(label,valores,'pie','myChart')
                Graficos(label,valores,'bar','myChart1')
               
            }
        });
    }
    function dropMarkers(data){
        $('#maker').append(
            '<span data-lon="'+data.lon+'" data-lat="'+data.lat+'" class="dropdown-item markers_do_mapa">'+data.rastreado+'</span>'
        )
    }
    function ZoomMarker(map){
        $('.markers_do_mapa').click(function(){
            var lon = $(this).attr('data-lon')
            var lat = $(this).attr('data-lat')
            var target = L.latLng(lon,lat);
            map.setView(target, 13);
            
        })
    }
    function Graficos(nomes = null,valores = null,type = null,chart = null){
        var ctx = document.querySelector("#"+chart).getContext('2d');
        var chart = new Chart(ctx,{
            type:type,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            },
            data:{
                labels:nomes,
                datasets:[{
                    label:'Resumo da semana',
                    data:valores,
                    backgroundColor: [
                        '#fff5dd',
                        '#dbf2f2',
                        '#d7ecfb',
                        '#ebe0ff',
                    ],
                    borderColor: [
                        '#ffde91',
                        '#5bc6c6',
                        '#48aaed',
                        '#a274ff',
                        
                    ],
                }]
            }
        })
    }
});