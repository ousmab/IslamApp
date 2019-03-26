$(document).on('click','#reponse_modal',function()
      {
        $('#modal_reponse').modal('show')
         $(".form-horizontal").show();
                         $("#ok_reponse").addClass('hidden')
                          $("#divsuccess").addClass('hidden')
                          $("#button_annuler").removeClass('hidden')
                          $("#button_repondre").removeClass('hidden')
        var id = $(this).data('id')
       $('#rid').text(id)
      });

      //button_repondre
      $('#button_repondre').click(function(){
          var id = parseInt($('#rid').text());
          $("#error").text(' ')
          
          $.ajax(
            {
                type: 'POST',
                url: 'solutions',
                data: {
                  'id' : id,
                 '_token' : $('input[name=_token]').val(),
                 'reponse' : $('#myreponse').val(),
                },
                beforeSend:function(){
                   $(".modal-content").hide()
                   $(".loader").removeClass('hidden')
                },
                complete: function(){
                 $('.modal-content').show()
                 $('.loader').addClass('hidden')
                },
                success:function(data)
                 {
                  if((data.errors))
                  {
               $.each(data.errors, function(key,value){
                   $('#error').removeClass('hidden')
               $('#error').append(value) 
               }) 
                   }
                    else{
                         $(".form-horizontal").hide();
                         $("#ok_reponse").removeClass('hidden')
                          $("#divsuccess").removeClass('hidden')
                          $("#button_annuler").addClass('hidden')
                          $("#button_repondre").addClass('hidden')
                          $('#que'+data.response.id).remove()
                          $("#myreponse").val('')

                    }
                 }
            }
        )

      })
         function idcode()
            { 
                var id = parseInt($('#themecode').text())
                var idreponse = parseInt($('#id_reponse').text())
                var idcode= new Array(id,idreponse);
                return idcode

            }
      $('#brouillon_reponse').click(function()
          {
              $('.help-block').text(' ')
              $('#divsuccess').addClass('hidden')
              $('#modal_reponse_final').modal('show')
              var id = parseInt($('#themecode').text())
              var idreponse = parseInt($('#id_reponse').text())
                //alert(id)
              $.ajax({
                type:'POST',
                url:'conclusion_theme',
                data:{
                  '_token' : $('input[name=_token]').val(),
                   'is_brouillon': 1,
                   'editordata' : $('#summernote').val(),
                   'codetheme' : id,
                   'idreponse': idreponse,
                },
                beforeSend:function(){
                    $(".modal-content").hide()
                    $(".loader").removeClass('hidden')
                 },
                 complete: function(){
                 // $('.modal-content').show()
                  $('.loader').addClass('hidden')
                 },
                 success:function(data)
                   {
                    if((data.errors))
                     {
                        $('#modal_reponse_final').modal('hide')
                        $(".help-block").removeClass('hidden')
                        $.each(data.errors, function(key,value){
                        $('.help-block').append(value) 
                        }) 
                     }
                       else{
                        $('.modal-content').show()
                        $('#divsuccess').removeClass('hidden')
                        $('#save_conclusion').addClass('hidden')
                        $('.loader').addClass('hidden')
                        $('#save_brouillon').removeClass('hidden')
                        $('#summernote').summernote('code',data.reponses.reponse_contenue)
                     }
                   }

              })
          }
    )
    $('#bouton_publier').click(function(){
        $('#modal_reponse_final').modal('show')
        $("#message_conclure").removeClass('hidden')
        $('#divsuccess').addClass('hidden')
        $(".modal-content").show()
        $(".loader").addClass('hidden')
        $('#save_brouillon').addClass('hidden')
        $('#save_conclusion').removeClass('hidden')
        $('#reprendre_conclusion').addClass('hidden')
        $('#diverrors').addClass('hidden')
        $('#diverrors').text(' ')
    
    })
    $('#save_conclusion').click(function(){
        var code =idcode()
        $('#message_conclure').removeClass('hidden')
        $.ajax({
            type:'POST',
            url:'conclusion_theme',
            data:{
                '_token' : $('input[name=_token]').val(),
                   'is_brouillon': 0,
                   'editordata' : $('#summernote').val(),
                   'codetheme' : code[0],
                   'idreponse': code[1], 
            },
            beforeSend:function(){
                $(".modal-content").hide()
                $(".loader").removeClass('hidden')
             },
             complete: function(){
              $('.loader').addClass('hidden')
              $(".modal-content").show()
             },
             success:function(data)
              {
                  if(data.errors)
                   {
                   
                    $("#diverrors").removeClass('hidden')
                    $('#message_conclure').addClass('hidden')
                    $.each(data.errors, function(key,value){
                        $('#diverrors').append(value) 
                        }) 
                        $('#reprendre_conclusion').removeClass('hidden')
                        $('#save_conclusion').addClass('hidden')

                   }
                   else
                   {
                    $("#divsuccess").removeClass('hidden')
                    $('#message_conclure').addClass('hidden')
                    $('#closebutton').addClass('hidden')
                    $('#save_conclusion').addClass('hidden')
                   // $('#closebutton').addClass('hidden')
                    $('#divsuccess').text(' ')
                    $('#divsuccess').text('THEME COCNCLUT ET ARCHIVER AVEC SUCCESS')
                    $("#themesuccess").removeClass('hidden') 
                   }
              }
        })
          
    })