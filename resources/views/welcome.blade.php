@extends('layouts.master')
@section('theme')
  @include('include.themebanire')
@endsection
@section('container')
  <div class="col-12 col-md-9">
      <div class="row">
          <div class="col-6 col-lg-4">
              <h2>COURS-AUDIO</h2>
              <p><center><img src="{{asset('images/trs3.jpg')}}"  class="img-thumbnail"></center></p>
              <P>Cours les 3 fondements</P>
              <p>Explications des 3 fondements par le check zakaria Doti</p>
              <p><a class="btn btn-outline-success" href="#" role="button">Suivie du post &raquo;</a></p>
          </div><!--/span-->
          <div class="col-6 col-lg-4">
              <h2>ARTICLE</h2>
              <p> <img src="images/coran1.jpg" class="img-thumbnail"> </p>
              <P>Les vertu du coran</P>
              <P>Un article sur les vertu du coran, sa valeur et sa place dans la vie du croyan.</P>
              <p><a class="btn btn-outline-success" href="#" role="button">Suivie du post &raquo;</a></p>
          </div><!--/span-->
          <div class="col-6 col-lg-4">
              <h2>SERMON</h2>
              <p><img src="images/vendredi.jpg" class="img-thumbnail"></p>
              <P>Sermon Al-ikma</P>
              <p>Sermont du vendredi de la mosquee Al-ikma check Omar farouk Hamza</p>
              <p><a class="btn btn-outline-success" href="#" role="button">Suivie du post &raquo;</a></p>
          </div><!--/span-->
     </div>
     <div clas="col-8 col-md-8" id="maroufa"><p class="maroufa"><h2>Theme</h2></p> </div>
    <div class="col-8 col-md-8">La femme en islam</div>
  </div>
@endsection
