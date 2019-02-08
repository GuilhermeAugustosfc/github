$(document).ready(function(){
    var id = window.location.search.split("=")[1];
    var url_resumos = $('#config_pagina').attr('data-resumo');
    var TodosOsCampos = $('.input').serializeArray();
    var id_hidden = TodosOsCampos[0].name;

    preechimento_dos_selects()

    colocando_registros_na_input_pelo_id();

    $('#btn-confirmar').on("click",function(){
        if($('#'+id_hidden).val() != ""){
            ajax_inserir_ou_editar('PUT')   
        }else{
            ajax_inserir_ou_editar('POST') 
        }    
    })
function colocando_registros_na_input_pelo_id(){
    if(id != undefined){
        dados = {
            id:id
        }
        var controler = $('#config_pagina').attr('data-controler');
        $.ajax({
            method: "GET",
            url: controler,
            data: dados,
            dataType: "JSON"
        }).done(function(data){
            for(var i = 0 in TodosOsCampos){
                var key = TodosOsCampos[i].name
                var value = data[key]
                $('#'+key).val(value);
            }
            $('#'+id_hidden).val(data[id_hidden])  
        })
    }
}
function preechimento_dos_selects(){
    $.ajax({
        method: "GET",
        url: url_resumos,
        dataType: "JSON"
    }).done(function(data){
        for(var i in data){
            for(var j in data[i].dados){
                $('select[data-tabela='+data[i].tabela+']').append(
                    "<option value='"+data[i].dados[j].id+"'>"+data[i].dados[j].descricao+"</option>"
                )
            }
        }
        colocando_registros_na_input_pelo_id();
    })
}
function ajax_inserir_ou_editar(metodo){
    var url = $('#config_pagina').attr('data-controler');
    var Campos = $('.input').serializeArray();
    $.ajax({
        method: metodo,
        data:Campos,
        url: url,
        dataType: "JSON"
    }).done(function(data){
        if(data.status){
            var reload = $('#config_pagina').attr('data-reload');
            if(metodo == 'PUT'){
                window.location.href = reload+'?editar';
            }else{
                window.location.href = reload+'?adicionar';
            }
        }else{
            iziToast.error({
                message: data.dados,
            });
        }
        })
    }
})
$(document).keypress(function(e){
    if(e.which == 13) $('#btn-confirmar').click()
});


