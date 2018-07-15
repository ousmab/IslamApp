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
      $('#brouillon_reponse').click(function()
          {
              $('#modal_reponse_final').modal('show')
          }
    )