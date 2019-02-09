var polyline = {};
var markers = [];
$(document).ready(function(){
    Monta_Select();
    $('#data_inicio').datetimepicker({
        uiLibrary: 'bootstrap4',
        modal:true,
        footer:true,
        format: 'yyyy/mm/dd hh:MM'
    });
    $('#data_fim').datetimepicker({
        uiLibrary: 'bootstrap4',
        modal:true,
        footer:true,
        format: 'yyyy/mm/dd hh:MM'
    });
    var map = cria_mapa();
    map.on('click',function(e){
        console.log(e.latlng);
        
    })
    $('#tabela_relatorio').bootstrapTable({
        columns:[{
            field:'lat',
            title:'Latitude'
        },{
            field:'lon',
            title:'Longitude'
        },{
            field:'eve_data_gps',
            title:'Data do gps',
            sortable:true,
            formatter:data_certa
        },{
            field:'eve_ignicao',
            title:'ignicao',
            sortable:true,
            formatter:icon_ignicao
        },{
            field:'eve_gps',
            title:'GPS',
            sortable:true,
            formatter:icon_gps
        },{
            field:'eve_gprs',
            title:'GPRS',
            sortable:true
        },{
            field:'eve_velocidade',
            title:'Velocidade',
            sortable:true,
            formatter:velocidade_em_km
        }]
    })
    
    $('#buscar').click(function(){
        var dados = $('.busca').serializeArray();
        if(valida_dados(dados)){
            $.ajax({
                method: "get",
                url: "Relatorio/BuscaRegistros",
                data:dados,
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    $('#tabela_relatorio').bootstrapTable('removeAll');
                    $('#tabela_relatorio').bootstrapTable('load',data);
                    

                    map.removeLayer(polyline);
                    for(i in markers) {
                        map.removeLayer(markers[i])
                    }
                    addPonyLine(data)
                    addMarker(data)
                }
            })
        } 
    })
    function addMarker(data){
        for(var i in data){
            var cor = (data[i].eve_ignicao == '1')?'green':'red'
            let target = L.latLng(data[i].lon, data[i].lat);
            let markerzinho = L.marker(target,{icon:L.AwesomeMarkers.icon({icon: 'fa fa-car', markerColor: cor, prefix: 'fa',})});
            markers.push(markerzinho);
            markerzinho.addTo(map)
        }
    }
    function addPonyLine(data){
        
        if(data.length >= 1){
            var cordenadas = [];
            for(var i = 0 in data){
                cordenadas.push([data[i].lon,data[i].lat])
            }                    
            polyline = L.polyline(cordenadas, {color: 'orange'}).addTo(map);
            map.fitBounds(polyline.getBounds());
        }else{
            iziToast.error({
                title: 'Erro',
                message: 'Dados não encontrados',
            });
        }
    }
    function Monta_Select(){
        $.ajax({
            method: "GET",
            url: 'Instalacao/Resumo',
            dataType: "JSON"
        }).done(function(data){
            for(var i in data){
                for(var j in data[i].dados){
                    $('select[data-tabela='+data[i].tabela+']').append(
                        '<option value="'+data[i].dados[j].id+'">'+data[i].dados[j].descricao+'</option>'
                    )
                }
            }
        })
    }
    function valida_dados(dados){
        var valid = true;
        
        for(var i in dados){
            console.log(dados[i].value);
            
            if(dados[i].value == ""){
                valid = false;
            }
        } 
        if(!valid){
            iziToast.warning({
                title: 'Presta Atenção',
                message: 'Você está esquecendo alguma infomação nos campos!!!!!',
            });
            return false;
        }else{
            return true
        }
    }
    function velocidade_em_km(value,row,index){
        let velocidade =  row.eve_velocidade
        if(velocidade != null){
            return [
                velocidade +' km'
            ].join('')
        }else{
            return [
                '0'
            ].join('')
        }
    }
    function icon_gps(value, row, index) {
        if(row.eve_gps == "1"){
            return [
            '<a class="ignicao" href="javascript:void(0)" title="GPS">',
            '<i class="fas fa-satellite-dish text-success"></i>',
            '</a> ',
            ].join('')
        }else{
            return [
                '<a class="ignicao" href="javascript:void(0)" title="GPS">',
                '<i class="fas fa-satellite-dish text-danger"></i>',
                '</a> ',
            ].join('')
        }
    }
    function data_certa(value, row, index) {
        let data = row.eve_data_gps;
        let data_dividida = data.split("-");
        let hora_dividida = data_dividida[2].split(" ");
        let data_corrigida = hora_dividida[0]+'-'+data_dividida[1]+'-'+data_dividida[0]+ ' '+ hora_dividida[1];
        return data_corrigida; 
    }
    function icon_ignicao(value, row, index) {
        
        if(row.eve_ignicao == "1"){
            return [
            '<a class="ignicao" href="javascript:void(0)" title="ignicao">',
            '<i class="fas fa-key text-success"></i>',
            '</a> ',
            ].join('')
        }else{
            return [
                '<a class="ignicao" href="javascript:void(0)" title="ignicao">',
                '<i class="fas fa-key text-danger"></i>',
                '</a> ',
            ].join('')
        }
      }
    function cria_mapa(){
        
        var element = document.getElementById('mymap');
        element.style = 'height:530px;border-radius:.50rem;';
        var map = L.map(element);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        target = L.latLng(-22.2107715,-49.6771926);
        map.setView(target, 14);
        let markerInicial = L.marker(target,{icon:L.AwesomeMarkers.icon({icon: 'fas fa-car fa-2x', markerColor: 'blue', prefix: 'fa',})});
        markers.push(markerInicial)
        markerInicial.addTo(map);
        return map;
    }
})

