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
        $.ajax({
            method: "GET",
            url: "Teste/teste",
            dataType: "JSON"
          }).done(function(data){
             for (var i in data.dados) {
                $('#Nomes').append(
                    '<option value='+data.dados[i].eve_id+'>'+data.dados[i].eve_data_servidor+'</option>'
                )                 
            }
            
        })

    })
    
    $(document).keypress(function(e){
        if(e.which == 13) $('#btn-confirmar').click()
    });
    