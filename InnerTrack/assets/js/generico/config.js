$(document).ready(function(){
const container = document.querySelector('#container-menu');
const ps = new PerfectScrollbar(container);

const tabela = document.querySelector('#tabela');
const pa = new PerfectScrollbar(tabela);
// Permissoes();
pega_alertas(function(data){
    
    $('#sino_de_alerta').text(data.alertas[0].alertas);
    $('#logado_nome').text(data.dados_da_session.usu_nome);
    
})

$("#modal").iziModal({
    overlayClose: true,
    width: 900,
    autoOpen: false,
    overlayColor: 'rgba(0, 0, 0, 0.6)',
    history: false,
    fullscreen: false,
    headerColor: '#000000',
    group: 'group1',
    zindex: 20000,
    loop: true,
    onOpening: function(modal){
         modal.startLoading();
         var url_relatorio = $('#config_pagina').attr('data-relatorio')
         $.ajax({
            method: "GET",
            url: url_relatorio,
            crossDomain : true, 
            dataType: "JSON",
            success: function(data){
                $('#minhaTabela').bootstrapTable({
                    data:data,
                    columns:[{
                        field:'ale_data',
                        title:'Data do alerta',
                        sortable:true
                    },{
                        field:'ale_tip_descricao',
                        title:'Descrição do alerta',
                        sortable:true
                    },{
                        field:'ale_lido',
                        title:'Lido',
                        sortable:true,
                        formatter:messagem,

                    },{
                        field:'nome_usuario',
                        title:'Nome do usuario',
                        sortable:true
                    },{
                        field:'rastreado',
                        title:'Veiculo'
                    }]
                });
                modal.stopLoading();
                }
            })
        }
    });

    $(document).on('click', '.abre_modal', function (event) {
        $('#modal').iziModal('open');
        
    });
    
    function messagem(value, row, index)
    {
        if(row.ale_lido == '1'){
            return [
                '<a class="lido" href="#" title="Lido ">',
                '<i class="fas fa-envelope-open text-secundary"></i>',
                '</a> ',
                ].join('')
        }else{
            return [
                '<a class="nao_lido" href="javascript:void(0)" title="Não lido">',
                '<i class="fas fa-envelope text-primary"></i>',
                '</a> ',
                ].join('')
        }
        
    }
    function pega_alertas(callback)
    {
        var url_alerta = $('#config_pagina').attr('data-alerta');
        $.ajax({
            method: "get",
            url: url_alerta,
            dataType: "JSON",
            success: function(data){
                callback(data)
            }
        })
    }
//    
// function Permissoes(){
//     let permisao = window.location.search.split('=')[1];
    
//     if(permisao == 'false'){
//         iziToast.warning({
//             title: 'Erro',
//             message: 'Apenas para administradores!',
//             position:'center'
//         });
//     }
// }
   

})


