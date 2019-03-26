$(document).on('click','#qdddduestion',function()
     {
        $('#modalsuccess').modal('show');
     }
)
$("#squestion").click(function () {
    $("#modalsuccess").modal('toggle');
});
$('#close1').click(function (){
     $('#alert1').hide();
    
}
)
$('#close2').click(function (){
    $('#alert2').hide();
    //$('.myspan').append('<em>salu</em>') 
}
)
$('#question').click(function(){
     var chek = $('#chek').is(':checked');
     var idtheme = $('input[name=idtheme]').val()
     var nom= $('input[name=nom]').val()
     var email = $('input[name=email]').val()
     var question = $('#maquestion').val()
      if((nom=='')||(email=='')||(question==''))
        alert('TOUS SES CHAMPS SONT OBLOGATOIRE')
        else
         {
            $.ajax(
                {
                    type: 'POST',
                    url: 'addquestion',
                    data: {
                        '_token' : $('input[name=_token]').val(),
                        'nom' : $('input[name=question_emeteur]').val(),
                        'idtheme' :$('input[name=idtheme]').val() ,
                        'status' : $('#chek').is(':checked'),
                        'email' : $('input[name=question_email]').val(),
                        'question' : $('#maquestion').val(),
                        
                    },
                    success: function(data){
                               if((data.errors))
                                 {
                              $.each(data.errors, function(key,value){
                                  $('#alert2').removeClass('d-none')
                              $('#queserror').append('<li>'+value+'</li>') 
                              })
                                 }
                  else{
                    $('#myreponse').removeClass('d-none')
                    $('.form-horizontal').hide();
                    $('#buttonenvoyer').hide();
                  }
                    },
                })
                    
         }
});