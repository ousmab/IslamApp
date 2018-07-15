@extends('layouts.admin')
@section('content')
  @if(is_array($theme))
  <h1>Pas de theme en ligne</h1>
    @else
<h1>Conclusion du theme {{ $theme->titre}} (theme en ligne)</h1>
 @endif
<hr>
<form method="POST" role="form" class="@if(is_array($theme)) hidden @else  @endif">
                {{ csrf_field() }}
   <div class="form-group has-error">
  <textarea id="summernote" name="editordata"></textarea>
    {!!$errors->first('editordata','<span class="help-block">:message</span>')!!}
  </div>
       <input type="number" name="id_theme" class="hidden" value="@if(!is_array($theme)){{$theme->id}} @else 1 @endif">
  
                        <div class="form-group">
                            
                                <button  class="btn btn-success btn-lg">
                                    PUBLIER
                                </button>
                                <button id="brouillon_reponse" class="btn btn-primary btn-lg">
                                    Mettre en brouillon
                                </button>
                            
                        </div>
</form>

<div id="modal_reponse_final" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="loader hidden">
    </div>
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            
                   
                      <div class="alert alert-success hidden" id="divsuccess" >Reponse envoyer</div>
            </div>
            <div class="modal-footer">
                </div>
                </div>
    </div>
</div>

@endsection
@section('script.question')
 <script>
     $('#ulmenu2').show();
   /*  $('#fermer').click(function(){
           $('#message').hide();  
     }); */
 </script>
@endsection
@section('script.question2')
<script src="{{ asset('js/question.js') }}"></script>
<script>$('#summernote').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});</script>
@endsection
@section('script.reponse')
 <script src="{{ asset('js/reponsejs.js') }}"></script>
 @endsection