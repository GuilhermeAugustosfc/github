$(document).ready(function(){
    var markers = [];
    var element = document.getElementById('map_teste');
    var map = L.map(element);    
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var target = L.latLng(-22.217478,-49.657750 );
    map.setView(target, 12);
    // cria_marker(boxmarker,function(marker){
    //    marker.on('dragend',function(){
    //         let latlng = marker.getLatLng()
    //         console.log(latlng.lat);
            
    //     })
    // })
    
    $(document).on('click','#idd_marker',function(){
        for(var i in markers){
            map.removeLayer(markers[i])
        }
        let latlng = L.latLng(-22.211997,-49.660369);
        let marker = L.marker(latlng,{
            draggable:true
        })
        markers.push(marker);
        marker.bindPopup('Arraste onde deseja salvar!');
        marker.addTo(map).openPopup();
        marker.on('dragend',function(){
            let posicao = marker.getLatLng();
            
        })
    })
    
    $(document).on('click','#abre_caixa_botoes',function(){
        $('#abre_caixa_botoes').addClass('none');
        $('#caixa-botoes').removeClass('none');
    })
    $(document).on('click','#cancelar_tipo',function(){
        $('#caixa-botoes').addClass('none');
        $('#abre_caixa_botoes').removeClass('none');
    })
    $(document).on('click','#salvar_tipo',function(){
       
        var novo_tipo = $('#novo_tipo').val();
        $('#select').append(
            '<option value="'+novo_tipo+'">'+novo_tipo+'</option>'
        );
        iziToast.success({
            title: 'Salvo',
            message: 'Comando executado!!',
            timeout:1000
        });
        $('#caixa-botoes').addClass('none');
        $('#abre_caixa_botoes').removeClass('none');
        $('#novo_tipo').val('');
    })
    if($("#id_cliente").val() != ""){
        $('#cliente').append(
            '<div class="form-group">\
                <label for="cliente">Clientes</label>\
                <div class="input-group">\
                    <input type="text" id="cliente" class="form-control">\
                </div>\
            </div>'
        );
    }

})