$(document).ready(function(){
    $('#btn-confirmar').click(function(){
        var TodosOsCampos = $('input').serializeArray();
        var url = $('#input-hidden').attr('url');

        $.ajax({
            method: "POST",
            data:TodosOsCampos,
            url: url,
            dataType: "JSON"
          }).done(function(data){
              if(data.status){
                  window.location.href = "dashboard"
              }else{
                iziToast.error({
                    title: 'Falha!',
                    message: 'Login em senhas erradas!',
                });
                
            }
              
          });  
        
        })
    })
    $(document).keypress(function(e){
        if(e.which == 13) $('#btn-confirmar').click()
    });
    