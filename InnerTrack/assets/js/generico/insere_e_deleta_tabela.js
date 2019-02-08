$(document).ready(function(){

  var controler = $('#config_pagina').attr('data-controler')
  Monta_a_Tabela()
  deleta_registro()
  edita_registros()
  efeitos_dos_botoes();
  IziToastUX();
  
  function Monta_a_Tabela(){
    $.ajax({
      method: "GET",
      url: controler,
      dataType: "JSON"
    }).done(function(data){
      var colunas = [{checkbox:true}];
      for (var k in data[0]){
        colunas.push({
          field:k,
          title:k.substr(4),
          sortable:true
        }) 
      } 
      $('#myTable').bootstrapTable({
        data:data,
        columns:colunas
      })
    })
  }
  function deleta_registro(){
    var $table = $('#myTable')
    var $delete = $('#delete')
    $delete.click(function () {
    var rows = $table.bootstrapTable('getSelections');
    if(rows.length>0){
      iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        theme:'darkorange',
        color:'darkorange',
        title: 'Cuidado!',
        message: 'Tem certeza que deseja excluir isso?',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function (instance, toast) {
     
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                $.ajax({
                  method: "DELETE",
                  data:data = {rows},
                  url: controler,
                  dataType: "JSON"
                }).done(function(data){
                  if(data.status){
                    var reload = $('#config_pagina').attr('data-reload');
                    window.location.href = reload+"?deletar";
                  }
                })
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
          ],
        }); 
      }
    })
  }
  function IziToastUX(){
    var opcao = window.location.search.split('?')[1];
    switch (opcao) {
      case 'adicionar':
        iziToast.success({
          message:'<i class="fas fa-thumbs-up"></i> Cadastrado com sucesso!',
          timeout:2000
        });
        break;
      case 'editar':
        iziToast.success({
          message:'<i class="fas fa-thumbs-up"></i> Editado com sucesso!',
          timeout:2000
        });
        break;
      case 'deletar':
        iziToast.success({
          message:' <i class="fas fa-thumbs-up"></i> Deletado com sucesso!',
          timeout:2000
        });
        break;
    }
  
  }
  
  function edita_registros(){
    var $table = $('#myTable')
    var $edit = $('#edit')
    $edit.click(function () {
    var rows = $table.bootstrapTable('getSelections');
    var url_para_editar = $('#config_pagina').attr('data-edita');
    var info = Object.getOwnPropertyNames(rows[0]);
    var obj = rows[0]
    var nome = info[1];
    var id = obj[nome];
    window.location.href = url_para_editar+"?id="+id
    })
  }

  function efeitos_dos_botoes(){
    var $table = $('#myTable')
    var $delete = $('#delete')
    var $edit = $('#edit')
    $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table',function(){
    var rows = $table.bootstrapTable('getSelections');
    if(rows.length > 0 ){
      $delete.addClass('theme darkred');
      $edit.addClass('theme darkorange')
    }else{
      $delete.removeClass('theme darkred');
      $edit.removeClass('theme darkorange')
    }
    if(rows.length >= 2){
      $edit.attr('disabled','disabled');
    }else{
      $edit.removeAttr('disabled');
    }
    })
  }

});
