$(document).ready(function(){
    var markers = [];
    var dados_latlng = {}
    var element = document.getElementById('map_teste');
    var map = L.map(element);    
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var target = L.latLng(-22.217478,-49.657750 );
    map.setView(target, 12);
    $(document).on('click','#idd_marker',function(){
        $('.blokeia').addClass('none');
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
            dados_latlng.lat = posicao.lat;
            dados_latlng.lng = posicao.lng;
            
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
                    <input type="text" data-bind="cliente" name="cliente" id="cliente" class="form-control busca">\
                </div>\
            </div>'
        );
    }

    function criaTabela(data){
        $('#bootstrapTable').bootstrapTable({
            search:true,
            showRefresh:true,
            showColumns:true,
            detailView:true,
            detailFormatter:mostraDesque,
            classes:"preto",
            data:data,
            columns:[{
                field:"cliente",
                title:'Cliente',
                sortable:true
            },{
                field:"descricao",
                title:'Descrição',
                sortable:true,
                
            },{
                field:"cor-tipo",
                title:'Cor do ponto',
                sortable:true
            },{
                field:"cidade",
                title:'Cidade',
                sortable:true
            },{
                field:"estado",
                title:'Estado',
                sortable:true
            }]
        });
    }
    function mostraDesque(index,row,){
        var template = "<ul>"
        let key = Object.keys(row)
        let value = Object.values(row)
        for(var i = 0 in key){
            template += '<li>'+key[i]+' : '+value[i]+'</li>'
        }
        template +='</ul>'
        return template;
       
    }
    
    $(document).on('click','#salvar_dados_formulario',function(){
        var dados = {};
        campo_errado = "";
        var valid = true;
        $('[data-bind]').each(function(){
            let chave = $(this).attr('data-bind');
            let valor = $(this).val();
            if(valor != ""){
                dados[chave] = valor;
            }else{
                valid = false
                campo_errado = chave;
            } 
        })
        if(valid){
            var data  = [];
            data.push(dados);
            criaTabela(data);
        }else{
            $('[data-bind = '+campo_errado+']').focus()
        }
        
        
        
    })

})