<div class="container">
             <!--  <div class="media d-block d-md-flex mt-4">
  <img class="d-flex mb-3 mx-auto media-image z-depth-1" height="300" src="file:///C:/Users/Nexttel/Desktop/SALY-ABBO/Tamplate-test/camex.jpg"
    alt="Generic placeholder image">
  <div class="media-body text-center text-md-left ml-md-3 ml-0">
    <h5 class="mt-0 font-weight-bold">Le camex 2018</h5>
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

    <h5 class="mt-0 font-weight-bold"><button class="btn btn-success btn-md btn-block" type="button"><h5>Posez une question</h5></button></h5>
  </div>
</div> -->
     <section class="my-5">
         <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="@if(is_array($theme)) {{ asset('images/logo-vrai.gif') }}  @else 
             @if($theme)
        {{ asset('images/'.$photo->chemin_model) }} @else {{ asset('images/logo-vrai.gif') }} @endif @endif" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Post title -->
                                @if(is_array($theme))
                                <h3 class="font-weight-bold mb-3"><strong>Pas de theme en BD</strong></h3>
                                   @else
                                      @if($theme)
                                      
                                      <h3 class="font-weight-bold mb-3"><strong>{{ $theme->titre}}</strong></h3>
      <!-- Excerpt -->
      <p>{{ $theme->resume}}</p>
      <!-- Post data -->
      
                                          @else
                                          <h3 class="font-weight-bold mb-3"><strong>ISlamApp</strong></h3>
      <!-- Excerpt -->
      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut officiis debitis.</p>
      <!-- Post data -->
      
                                            @endif
                                     @endif
      
      <!-- Read more button -->
      <a class="btn btn-success btn-md" href='@if(! is_array($theme)){{url("/question/poser_question/{$theme->id}")}} @else # @endif' id="idquestion"><H5> @if(! is_array($theme)) POSER UNE QUESTION @else EN SAVOIR PLUS  @endif</H5></a>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">   
  </section>
  
            <!--Section: Jumbotron-->
            <section class="card wow fadeIn abbo" style="background-image: url({{ asset('images/myimage.jpg') }});">

                <!-- Content -->
                <div class="card-body text-white text-center py-5 px-5 my-5">

                    <h1 class="mb-4">
                        <strong>IslamApp une plate forme islamique pour la ouma</strong>
                    </h1>
                    <p>
                        <strong>La plate forme vitrine de la ouma</strong>
                    </p>
                    <p class="mb-4">
                        <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written
                            versions available. Create your own, stunning website.</strong>
                    </p>
                    <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-outline-white btn-lg">Start free tutorial
                        <i class="fa fa-graduation-cap ml-2"></i>
                    </a>

                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->

            <hr class="my-5">

            <!--Section: Cards-->
            <section class="text-center">

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                         <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="file:///C:/Users/Nexttel/Desktop/SALY-ABBO/Tamplate-test/carte3.png" class="card-img-top" alt="">
                                <a href="https://mdbootstrap.com/automated-app-start/" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">GEOLOCALISATION DES MOSQUEE</h4>
                                <!--Text-->
                                <p class="card-text">Learn how to create a smart website which learns your user and reacts properly to his behavior.</p>
                                <a href="file:///C:/Users/Nexttel/Desktop/SALY-ABBO/Tamplate-test/carte.jpg" target="_blank" class="btn btn-primary btn-md">Start tutorial
                                    <i class="fa fa-play ml-2"></i>
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="https://mdbootstrap.com/wp-content/uploads/2017/11/brandflow-tutorial-fb.jpg" class="card-img-top" alt="">
                                <a href="https://mdbootstrap.com/automated-app-start/" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">Bootstrap Automation</h4>
                                <!--Text-->
                                <p class="card-text">Learn how to create a smart website which learns your user and reacts properly to his behavior.</p>
                                <a href="https://mdbootstrap.com/automated-app-start/" target="_blank" class="btn btn-primary btn-md">Start tutorial
                                    <i class="fa fa-play ml-2"></i>
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="https://mdbootstrap.com/wp-content/uploads/2018/01/push-fb.jpg" class="card-img-top" alt="">
                                <a href="https://mdbootstrap.com/web-push-start/" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">Push notifications</h4>
                                <!--Text-->
                                <p class="card-text">Push messaging provides a simple and effective way to re-engage with your users and in this
                                    tutorial you'll learn how to add push notifications to your web app</p>
                                <a href="https://mdbootstrap.com/web-push-start/" target="_blank" class="btn btn-primary btn-md">Start tutorial
                                    <i class="fa fa-play ml-2"></i>
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-angular.jpg" class="card-img-top" alt="">
                                <a href="https://mdbootstrap.com/angular/" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">MDB with Angular</h4>
                                <!--Text-->
                                <p class="card-text">Built with Angular 5, Bootstrap 4 and TypeScript. CLI version available. </p>
                                <a href="https://mdbootstrap.com/angular/" target="_blank" class="btn btn-primary btn-md">Free download
                                    <i class="fa fa-download ml-2"></i>
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-react.jpg" class="card-img-top" alt="">
                                <a href="https://mdbootstrap.com/react/" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">MDB with React</h4>
                                <!--Text-->
                                <p class="card-text">Based on the latest Bootstrap 4 and React 16. </p>
                                <a href="https://mdbootstrap.com/react/" target="_blank" class="btn btn-primary btn-md">Free download
                                    <i class="fa fa-download ml-2"></i>
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-vue.jpg" class="card-img-top" alt="">
                                <a href="https://mdbootstrap.com/vue/" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">MDB with Vue</h4>
                                <!--Text-->
                                <p class="card-text">Based on the latest Bootstrap 4 and Vue 2.5.7. </p>
                                <a href="https://mdbootstrap.com/vue/" target="_blank" class="btn btn-primary btn-md">Free download
                                    <i class="fa fa-download ml-2"></i>
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

               

            </section>
            <!--Section: Cards-->

        </div>