//modal apparition formulaire ajout de geolocalisation
$(document).on('click','.edit-modal',function()
{
  $('#modal_map').modal('show')
  $('#delete_div').addClass('hidden')
  $("#modif_map").removeClass('hidden')
  $('.form-horizontal').removeClass('hidden')
  $('#modif_map').removeClass('hidden')
  $('#save_map').addClass('hidden')
  $("#map_id").val($(this).data('id'))
  var id = parseInt($('#map_id').val())
  $("#map_name").val($(this).data('name'));
  $("#map_type").val($(this).data('type'));
  $("#map_ville").val($(this).data('ville'));
  $("#map_long").val($(this).data('long'));
  $("#map_lat").val($(this).data('lat'));
  $('#delete_map').addClass('hidden')
      
})
$(document).on('click','#add_map',function(){
  $(".form-horizontal")[0].reset();
    $('#save_map').removeClass('hidden')
    $('#modif_map').addClass('hidden')
    $('#modal_map').modal('show')
    $('#delete_div').addClass('hidden')
    $('.form-horizontal').removeClass('hidden')
    $('#delete_map').addClass('hidden')
  
  });
//buutoon edition geolocalisation
  $('#modif_map').click(function(){
    var id = parseInt($('#map_id').val())
    $.ajax(
      {
          type: 'POST',
          url: '/update_map',
          data: {
            'map_name' :  $('input[name=map_name]').val(),
           '_token' : $('input[name=_token]').val(),
           'map_type' :  $('#map_type').val(),
           'map_ville': $('#map_ville').val(),
           'map_long': $('input[name=map_long]').val(),
           'map_lat': $('input[name=map_lat]').val(),
           'id':id,
          },
          beforeSend:function(){
             $(".modal-content").hide()
             $(".loader").removeClass('hidden')
          },
          complete: function(){
           $(".modal-content").show()
           $(".loader").addClass('hidden')
          },
          success:function(data)
           {
            if((data.errors))
            {
         $.each(data.errors, function(key,value){
             $('#'+key+'-div').addClass('has-error')
             $('#'+key+'-error').removeClass('hidden')
             $('#'+key+'-error').append(value) 
         }) 
             }
              else{
                $(".form-horizontal").hide()
                $('#block-ok').removeClass('hidden')
                $('#retour_map').removeClass('hidden')
                $('.btn-warning').addClass('hidden')
                $('#modif_map').addClass('hidden')
              }
           }
      }
  ) 

    
  })

//button suavegarde d'une geolocalisation
  $('#save_map').click(function(){
   // var long =  $('input[name=map_long]').val()
   // alert(long)
   $('.form-group').removeClass('has-error')
   $('.help-block').text('')
   $('.help-block').addClass('hidden')
    $.ajax(
      {
          type: 'POST',
          url: '/save_map',
          data: {
            'map_name' :  $('input[name=map_name]').val(),
           '_token' : $('input[name=_token]').val(),
           'map_type' :  $('#map_type').val(),
           'map_ville': $('#map_ville').val(),
           'map_long': $('input[name=map_long]').val(),
           'map_lat': $('input[name=map_lat]').val(),
          },
          beforeSend:function(){
             $(".modal-content").hide()
             $(".loader").removeClass('hidden')
          },
          complete: function(){
           $(".modal-content").show()
           $(".loader").addClass('hidden')
          },
          success:function(data)
           {
            if((data.errors))
            {
         $.each(data.errors, function(key,value){
             $('#'+key+'-div').addClass('has-error')
             $('#'+key+'-error').removeClass('hidden')
             $('#'+key+'-error').append(value) 
         }) 
             }
              else{
                $(".form-horizontal").hide()
                $('#block-ok').removeClass('hidden')
                $('#retour_map').removeClass('hidden')
                $('.btn-warning').addClass('hidden')
                $('#save_map').addClass('hidden')
              }
           }
      }
  ) 

  });
 //affichage modal pour la supression d'une geolocalisation
 $(document).on('click','.delete-modal',function(){
  $("#my_id").text($(this).data('id'))
  $('#delete_div').removeClass('hidden')
  $('.form-horizontal').addClass('hidden')
  $('#delete_map').removeClass('hidden')
  $("#modif_map").addClass('hidden')
  $('#save_map').addClass('hidden')
  $('#modal_map').modal('show')
 })
 $('#delete_map').click(function()
 {
  var id = $('#my_id').text()
   id = parseInt(id)
  $.ajax({
     type:'POST',
     url:'/delete_map',
     data:
     {
      '_token' : $('input[name=_token]').val(),
      'id':id,
     },
     beforeSend:function(){
      $(".modal-content").hide()
      $(".loader").removeClass('hidden')
   },
   complete: function(){
    $(".modal-content").show()
    $(".loader").addClass('hidden')
   },
   success:function(data)
     {
       if(data.errors)
       {
               alert('Une erreur c"est produt')
       }else{
        $('#retour_map').removeClass('hidden')
        $('.btn-warning').addClass('hidden')
        $('#delete_map').addClass('hidden')
        $("#block-ok").text('')
        $("#block-ok").text('SUPPRESSION REUSSI'+id)
        $('#block-ok').removeClass('hidden')
        $('#delete_div').addClass('hidden')
        $('.map'+$('#my_id').text()).remove()
       }
     }
  })
 })