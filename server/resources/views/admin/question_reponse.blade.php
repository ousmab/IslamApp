@extends('layouts.admin')
@section('content')
<h1>REPONSE AUX QUESTION</h1>
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
          <a href="#" id="reponse_modal" class="show-modal btn btn-success btn-sm" data-id="{{$value->id}}">
           REPONDRE
          </a>
         </th>
            </tr>
            @endforeach
       </tbody>
</table>
  {{$questions->links()}}
  <div id="modal_reponse" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="loader hidden">
    </div>
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" role="form" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-10">
                            <h4 claas="modal-title">REPONSE A LA QUESTION <em id="rid"></em></h4>
                            <p class="error text-center alert alert-danger hidden" id="error"></p>
                                <textarea name="mareponse" id="myreponse" class="form-control" rows="5" value="{{ old('resume') }}" required></textarea>
                              
                            </div>
                        </div>
                    </form>
                   
                      <div class="alert alert-success hidden" id="divsuccess" >Reponse envoyer</div>
            </div>
            <div class="modal-footer">
                    <button type="buttton" class="btn btn-success" id="button_repondre">
                        repondre
                    </button>
                     <button type="buttton" data-dismiss="modal" class="btn btn-success hidden" id="ok_reponse" >
                        OK
                    </button>
                    <button type="buttton" class="btn btn-warning" data-dismiss="modal" id="button_annuler">
                        annuler
                    </button>
                   
                </div>
                </div>
    </div>
</div>
  

        
@endsection
@section('script.question')
 <script>
     $('#ulmenu2').show();
  
 </script>
 @endsection
 @section('script.reponse')
 <script src="{{ asset('js/reponsejs.js') }}"></script>
 @endsection