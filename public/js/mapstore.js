//modal apparition formulaire ajout de geolocalisation
$(document).on('click','#add_map',function(){
    $('#modal_map').modal('show')
  });


//button suavegarde d'une geolocalisation
  $('#save_map').click(function(){
   // var long =  $('input[name=map_long]').val()
   // alert(long)
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
                  alert('sauvegarde reussie')
              }
           }
      }
  ) 

  });