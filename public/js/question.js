$(document).on('click','#validation_modal',function()
     {
        $('#mymodal').modal('show');
        $('.contentvalidation').removeClass('hidden')
        $('#validation').removeClass('hidden')
        $('.cancel_question').addClass('hidden')
    $('#deletequestion').addClass('hidden')
    $('#ok_valid').addClass('hidden')
    $("#button_annuler").removeClass('hidden')
    $('#myalerts').addClass('hidden')
    $('#myalerts2').addClass('hidden');
    var id = $(this).data('id');
       $('#vid').text(id)
             
     }
)
  $(document).on('click','#cancel_modal',function()
{
    $('#mymodal').modal('show');
    $('.contentvalidation').addClass('hidden')
    $('#validation').addClass('hidden')
    $('.cancel_question').removeClass('hidden')
    $('#deletequestion').removeClass('hidden')
    $('#ok_valid').addClass('hidden')
    $("#button_annuler").removeClass('hidden')
    $('#myalerts').addClass('hidden')
    $('#myalerts2').addClass('hidden');
    var id = $(this).data('id');
       $('#vid').text(id)
})
   $('#validation').click(function()
 {
      var id = parseInt($('#vid').text());

           $.ajax(
               {
                   type: 'GET',
                   url: 'valider_question',
                   data: {
                     'id' : id,
                   },
                   success:function(data)
                    {
                        $('.contentvalidation').addClass('hidden')
                        $('#validation').addClass('hidden')
                        $('#ok_valid').removeClass('hidden')
                        $("#button_annuler").addClass('hidden')
                        $('#myalerts').removeClass('hidden');
                        $('#que'+data.response.id).remove()
                    }
               }
           )

  })
   $('#deletequestion').click(function(){
    var id = parseInt($('#vid').text());
      $.ajax(
          {
              type: 'GET',
              url: 'delete_question',
              data:{
                  'id' :id,
              },
              success:function(data)
              {
                $('.cancel_question').addClass('hidden')
                $('#deletequestion').addClass('hidden')
                $('#ok_valid').removeClass('hidden')
                $("#button_annuler").addClass('hidden')
                $('#myalerts2').removeClass('hidden');
                $('#que'+data.response.id).remove()   
              }

          }
      )
   })