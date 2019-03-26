@extends('layouts.mdbmaster')
@section('masection')
<div class="container">     
  <section class="my-5">
    <!-- Grid row -->
    @if($themesarchiver)
      @foreach($themesarchiver as $key => $theme)
    <div class="row">
    <!-- div apparition de l'image,on utilise une boucle -->
      <div class="col-lg-5">
       <!-- Featured image -->
        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
         @if($photos)
          @foreach($photos as $key => $img)
          @if($img->id_model==$theme->id)
            <img class="img-fluid" src="{{ asset('images/'.$img->chemin_model) }}" alt="Sample image">
          @endif
          @endforeach
         @else
          <img class="img-fluid" src="{{ asset('images/logo-vrai.gif') }}" alt="Sample image">
        @endif
      
            <a>
               <div class="mask rgba-white-slight"></div>
            </a>
         </div>
      </div>
      <!-- Grid column -->
      <div class="col-lg-7">
        <!-- Post title -->
        <h3 class="font-weight-bold mb-3"><strong>{{$theme->titre}}</strong></h3>
        <!-- Excerpt -->
        <p>{{$theme->resume}}</p>
        <!-- Post data -->
        
        <!-- Read more button -->
        <a class="btn btn-success btn-md" href='{{url("/question/vue_question/{$theme->id}")}}'>Voir la clonclusion</a>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  <hr class="my-5"> 
     @endforeach
  @else
    <p class="text-center">PAS DE THEME ARCHIVER ENCORE </p>
  @endif  
  </section>
            
            <!--Section: Cards-->

@stop