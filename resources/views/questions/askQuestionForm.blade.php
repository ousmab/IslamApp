@extends('layouts.mdbmaster')
@section('masection')

 <div class="container">

<!--Section: Post-->
<section class="mt-4">

    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

            <div class="view overlay rounded  mb-lg-0 mb-4">
        <img class="img-fluid" style="width: 100%" src=" {{ asset('images/'.$photo->chemin_model) }}" alt="Sample image">
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
<div class="news">

<!-- Label -->
<div class="label">
 <!-- <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1-mini.jpg" class="rounded-circle z-depth-1-half">-->
<h3>Hauteur question</h3>
</div>

<!-- Excerpt -->
<div class="excerpt">

  <!-- Brief -->
  <div class="brief">
    <a class="name">John Doe</a> added you as a friend
    <div class="date">1 hour ago</div>
  </div>
</div>
<!-- SI UN ERUDIT A REPONDUT A LA QUESTIONS CE PANEL S'AFFICHES-->
   <div class="row">
      <div class="col-md-5">
 <section class="mt-4">
   <div class="card" width="100px">
<h3 class="card-header success-color white-text">Reponse a la questiion</h3>
<div class="card-body">
<h4 class="card-title">Panel title</h4>
<h6 class="card-subtitle mb-2 text-muted">Panel subtitle</h6>
<p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
<a href="#" class="card-link">Panel link</a>
<a href="#" class="card-link">Another link</a>
</div>
</div> </section></div></div>
</div>  <hr class="my-5">   
<!--FIN div question-reponse -->
<div class="card">
    <div class="card-header deep-orange lighten-1 white-text"><h2>Conclusion du theme</h2></div>
    <div class="card-body">
        <h4 class="card-title">Special title treatment</h4>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a class="btn btn-deep-orange">Go somewhere</a>
    </div>
</div><hr class="my-3">   
<div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Posser votre question</div>
                            <div class="card-body">

                                <!-- Default form reply -->
                                <form method="POST" action="{{ url('/question/poser_question/addquestion') }}" >
                                {{ csrf_field() }}
                                    <!-- Comment -->
                                    <div class="form-group">
                                        <label for="replyFormComment">Votre question</label>
                                        <textarea class="form-control" id="replyFormComment" name='question' rows="5"></textarea>
                                    </div>

                                    <!-- Name -->
                                    <label for="replyFormName">Votre nom</label>
                                    <input type="text" id="replyFormName" name="emeteur" class="form-control">

                                    <br>

                                    <!-- Email -->
                                    <label for="replyFormEmail">Votre Email</label>
                                    <input type="email" id="replyFormEmail" name="email" class="form-control">
                                       </br>
                                <div class="checkbox btn btn-outline-primary waves-effect">
        
            <label style="font-size: 1em">
                <input type="checkbox" name="question_status" class="form-check-input" id="chek" >
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                Cocher si la question est privée
            </label>
        </div>
                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">ENVOYER</button>
                                    </div>
                                </form>
                                <!-- Default form reply -->



                            </div>
                        </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <!--Colone de guauche avec les news letters,theme archiver-->
        <div class="col-md-4 mb-4">

            
            <div class="card mb-4 wow fadeIn">

<div class="card-header">Related articles</div>

<!--Card content-->
<div class="card-body">

    <ul class="list-unstyled">
        <li class="media">
            <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <a href="">
                    <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                </a>
                Cras sit amet nibh libero, in gravida nulla (...)
            </div>
        </li>
        <li class="media my-4">
            <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder6.jpg" alt="An image">
            <div class="media-body">
                <a href="">
                    <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                </a>
                Cras sit amet nibh libero, in gravida nulla (...)
            </div>
        </li>
        <li class="media">
            <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <a href="">
                    <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                </a>
                Cras sit amet nibh libero, in gravida nulla (...)
            </div>
        </li>
    </ul>

</div>

</div>
            <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 text-center wow fadeIn">

                <div class="card-header">Do you want to get informed about new articles?</div>

                <!--Card content-->
                <div class="card-body">

                    <!-- Default form login -->
                    <form>

                        <!-- Default input email -->
                        <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                        <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                        <br>

                        <!-- Default input password -->
                        <label for="defaultFormNameEx" class="grey-text">Your name</label>
                        <input type="text" id="defaultFormNameEx" class="form-control">

                        <div class="text-center mt-4">
                            <button class="btn btn-info btn-md" type="submit">Sign up</button>
                        </div>
                    </form>
                    <!-- Default form login -->

                </div>

            </div>
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
 @section('script')
 <script src="{{ asset('js/formjsquestion.js') }}"></script>
 @stop