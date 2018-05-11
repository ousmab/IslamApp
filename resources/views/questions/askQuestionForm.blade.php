@extends('layouts.master')
@section('container')

<p class="btn btn-default h3 text-center py-4">  <i class="fa fa-pencil"></i> Poser une question sur le theme {{$theme->titre}}</p>
<div class="preloader-wrapper big active crazy">
  <div class="spinner-layer spinner-blue-only">
    <div class="circle-clipper left">
      <div class="circle"></div>
    </div>
    <div class="gap-patch">
      <div class="circle"></div>
    </div>
    <div class="circle-clipper right">
      <div class="circle"></div>
    </div>
  </div>
</div>
<div class="col-12 col-md-9">
<div class="alert alert-danger d-none" id="alert2">
<button type="button" class="close"  aria-label="Close" id="close2">
    <span class="myspan" aria-hidden="true">&times;</span>
  </button>
  <strong>Erreur: <ul id="queserror"></ul></strong>  
</div>
<div class="card d-none" id="myreponse">
<div class="card-body">
  <!-- Title -->
  </br>
  <h4 class="card-title text-center"><a>Envoi reussi</a></h4>
  <!-- Text -->
  <div class="alert alert-success" id="alert1">
  <strong>Votre question est en cours de validation.</strong>
 
</div>
  <!-- Button -->
  <a href="{{url('/')}}" class="btn btn-primary">Retour page accueil</a>
  <a href='{{url("/question/poser_question/{$theme->id}")}}' class="btn btn-info">Posez une nouvel question</a>
</div>
</div>

        <form class="form-horizontal" method="POST" role="form" action="addquestion">
     {{ csrf_field() }}
     <input type="number" name="idtheme" class="form-control d-none" value="{{$theme->id}}">
    <div class="md-form from-group">
        <i class="fa fa-user prefix grey-text"></i>
        <input type="text" name="question_emeteur" class="form-control" id='emeteur'>
        <label for="materialFormContactNameEx">Votre nom</label>
    </div>
    <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="email" name="question_email" class="form-control">
        <label for="materialFormContactEmailEx">Votre email</label>
    </div>
    <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea type="text" name="question_contenue" id='maquestion' class="form-control md-textarea" rows="3"></textarea>
        <label for="materialFormContactMessageEx">Votre question</label>
    </div>
   <!-- <div class="form-check btn btn-warning">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Cocher si la question est privée
    </label>
  </div> -->
  <div class="checkbox btn btn-outline-primary waves-effect">
        
            <label style="font-size: 1em">
                <input type="checkbox" name="question_status" class="form-check-input" id="chek" >
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                Cocher si la question est privée
            </label>
        </div>
        </form>
        <div class="mt-4" id="buttonenvoyer">
        <button class="btn btn-outline-success btn-lg" type="submit" id="question">ENVOYER<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
     </div>

@endsection
 @section('script')
 <script src="{{ asset('js/formjsquestion.js') }}"></script>
 @stop