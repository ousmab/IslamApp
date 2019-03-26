@extends('layouts.admin')
@section('content')
<h1>Validation des questions</h1>
<hr>
<table class="table">
    <thead class="thead-inverse">
    <tr>
    <th>Numero</th>
       <th>Question</th>
    <th>Option</th>
    </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>
    @foreach($questions as $key => $value)
     <tr id="que{{$value->id}}">
         <th> {{$n++}}
         </th>
         <th> 
         {{$value->contenue}}
         </th>
         <th>
          <a href="#" id="validation_modal" class="show-modal btn btn-success btn-sm" data-id="{{$value->id}}">
           VALIDER 
          </a>
          <a href="#" id="cancel_modal" class="show-modal btn btn-danger btn-sm" data-id="{{$value->id}}">
           SUPRIMER
          </a>
         
         </th>
            </tr>
            @endforeach
       </tbody>
</table>
  {{$questions->links()}}
  <div id="mymodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 claas="modal-title"></h4>
            </div>
            <div class="modal-body">
      <div class="contentvalidation hidden"><h3> Cliquer sur valider la question<em id="vid"></em></h3> </div>
      <div class="cancel_question hidden"><h3>Ets vous sure de suprimer la questions </h3> </div>
      <div class="alert alert-success" id="myalerts">Validation reussie</div>
      <div class="alert alert-warning" id="myalerts2">supression reussie</div>
            </div>
            <div class="modal-footer">
                    <button type="buttton" class="btn btn-success hidden" id="validation">
                        valider
                    </button>
                    <button type="buttton" class="btn btn-danger hidden" id="deletequestion">
                        suprimer
                    </button>
                    <button type="buttton" class="btn btn-warning" data-dismiss="modal" id="button_annuler">
                        annuler
                    </button>
                    <button type="buttton" class="btn btn-success hidden" data-dismiss="modal" id="ok_valid">
                        ok
                    </button>
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
@endsection