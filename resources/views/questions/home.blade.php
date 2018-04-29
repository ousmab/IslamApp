@extends('layouts.master')

@section('container')
<div class="col-12 col-md-9">
      <div class="row">
         <ul class="list-unstyled  question-menu">
         	
         	<li class="list-inline-item"><a href="{{ route('poserQuestion') }}">Poser Une Question</a></li>
         	<li class="list-inline-item"><a href="">Voir tous les thémes</a></li>
         </ul>
     </div>
  </div>
@endsection