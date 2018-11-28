@extends('layouts.mdbmaster')
@section('masection')
<div class="container">     
  <section class="my-5">
    <!-- Grid row -->
    <div class="row">
      <div class="col-lg-5">
       <!-- Featured image -->
        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
          <img class="img-fluid" src="{{asset('images/img2.jpg')}}" alt="Sample image">
            <a>
               <div class="mask rgba-white-slight"></div>
            </a>
         </div>
      </div>
      <!-- Grid column -->
      <div class="col-lg-7">
      <!-- Category -->
        <!-- Post title -->
        <h3 class="font-weight-bold mb-3"><strong>Coran en français</strong></h3>
        <!-- Excerpt -->
        <p>- Lire le Coran en arabe à côté de sa traduction en français.
- (NOVEAUTÉ) Color Tajweed pour aider à lire et réciter le Saint Coran! (seul les deux premiers sourates dans la version gratuite)
- Continuer la lecture à partir de la dernière ayah en un seul clic!
- Rappels des Prières: abonnez-vous à des notifications de vos temps de prière locaux. Auto-configuration est disponible.</p>
        <!-- Post data -->
        <p>by <a><strong>By IsalmApp</strong></a>, 19/08/2018</p>
        <!-- Read more button -->
        <a class="btn btn-success btn-md">Installer</a>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
    <hr class="my-5">
    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-lg-7">
      <!-- Category -->
        
        <!-- Post title -->
        <h3 class="font-weight-bold mb-3"><strong>Tajwid Al Quran : Leçons, Coran lettres colorées</strong></h3>
        <!-- Excerpt -->
        <p>Tajwid Al Quran est une application permettant l'apprentissage de la lecture du Qur'an, donnant une vision globale sur différentes notions accompagnées avec des exemples.

Cette application aura des améliorations régulières afin de satisfaire aux besoins de ses utilisateur</p>
        <!-- Post data -->
        <p>by <a><strong>By IslamApp</strong></a>, 14/08/2018</p>
        <!-- Read more button -->
        <a class="btn btn-pink btn-md mb-lg-0 mb-4">Installer</a>
      </div>
<!-- Grid column -->
<!-- Grid column -->
      <div class="col-lg-5">
      <!-- Featured image -->
        <div class="view overlay rounded z-depth-2">
          <img class="img-fluid" src="{{asset('images/screen-8.jpg')}}" alt="Sample image">
          <a>
          <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      </div>
<!-- Grid column -->
    </div>
<!-- Grid row -->

  <hr class="my-5">

<!-- Grid row -->
<div class="row">

<!-- Grid column -->
<div class="col-lg-5">

<!-- Featured image -->
<div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
  <img class="img-fluid" src="{{asset('images/img2.jpg')}}" alt="Sample image">
  <a>
    <div class="mask rgba-white-slight"></div>
  </a>
</div>

</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-lg-7">

<!-- Category -->

<!-- Post title -->
<h3 class="font-weight-bold mb-3"><strong>	
Tajwid Al Quran : Leçons, Coran lettres colorées</strong></h3>
<!-- Excerpt -->
<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro qui dolorem ipsum quia sit amet.</p>
<!-- Post data -->
<p>by <a><strong>By IslamApp</strong></a>, 11/08/2018</p>
<!-- Read more button -->
<a class="btn btn-indigo btn-md">Installer</a>

</div>

  </div>
  <!-- Grid row -->

  <hr class="my-5">   
  </section>
            
            <!--Section: Cards-->

@stop