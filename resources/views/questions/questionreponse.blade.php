@extends('layouts.mdbmaster')
@section('masection')

<div class="container">
<!--Section: Post-->
  <section class="mt-4">
    <!--Grid row-->
     <div class="row">
       <!--Grid column-->
        <div class="col-md-8 mb-4">
         <!-- Contenue  question et reponse   -->
          <div class="view overlay rounded  mb-lg-0 mb-4">
          @if($photo)
            <img class="img-fluid" style="width: 50%" src="{{ asset('images/'.$photo->chemin_model) }}" alt="Sample image">
          @else 
          <img class="img-fluid" style="width: 50%" src="{{ asset('images/logo-vrai.gif') }}" alt="Sample image">
          @endif
            <a>
              <div class="mask rgba-white-slight"></div>
          </a>
          </div></br></br>
        <!-- Grid column -->
    <div class="">

<!-- Post title -->
<h3 class="font-weight-bold mb-3"><strong>{{$theme->titre}}</strong></h3>
<!-- Excerpt -->
<p>{{$theme->resume}}</p>
<!-- Post data -->
</div>   <hr class="my-5">   
<!-- debut div quetion+reponse -->
<div class="card card-comments mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Questions et Reponse sur le theme</div>
                            <div class="card-body">
                               <!-- debut affichage question et reponse -->
                               @if($questions)
                               @foreach($questions as $key => $value)
                                <div class="media d-block d-md-flex mt-4">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{$value->emeteur}}
                                            <a href="" class="pull-right">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        </h5>
                                       {{ $value->contenue}}
                                     <!-- Debut reponse -->
                                     @foreach($reponses as $key => $reponse)
                                       @if($reponse->id_question==$value->id)
                                        <div class="media d-block d-md-flex mt-3">
                                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                                <h5 class="mt-0 font-weight-bold">Reponse a la question
                                                    <a href="" class="pull-right">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </h5>
                                                {{$reponse->reponse_contenue}}
                                            </div>
                                        </div>
                                        <!-- Fin reponse-->  
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                               <!-- Fin de question reponse -->
                                      
                                @endforeach
                              @else
                               PAS DE QUESTION, POSER UNE QUESTION <a href="/question/poser_question/{$question->id_theme}" class="btb btn-successs">poser</a>
                            @endif
                            </div>
                        </div>

 <hr class="my-5">   
<!--FIN div question-reponse -->
<div class="card @if($conclusion)  @else d-none  @endif">
    <div class="card-header deep-orange lighten-1 white-text"><h2>Conclusion du theme</h2></div>
    <div class="card-body">
        <h4 class="card-title">{{$theme->titre}}</h4>
        <p class="card-text">@if($conclusion) {!!$conclusion->reponse_contenue!!} @else  @endif</p>
        
    </div>
</div></div><hr class="my-3">   
      <!--  Fin du contenue -->
       <!--Grid column-->
        <!--Colone de guauche avec les news letters,theme archiver-->
        <div class="col-md-4 mb-4">
          @if($conclusion)
          @else
        <h3 class="card-header success-color white-text"><a>Poser une question</a></h3></br>
          @endif
            @include('questions.sidebarpost')
            <!--/.Card : Dynamic content wrapper-->

            <!--Card-->
            
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!--Section: Post-->

</div>

@endsection