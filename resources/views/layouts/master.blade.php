<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
        </head>
        <body>
                <nav style="height: 60px !important;padding: 40px 0px 30px 0px !important" class="navbar navbar-toggleable-md navbar-light bg-faded" id="mynav">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                         <div id="mynav1"> 
                          <a class="navbar-brand"   href="#" id="mynav1">
        <img style="width: 50%;height: 50%;text-shadow: 0px 5px #000" src="{{ asset('images/small_logo.png') }}" alt=""></a>
                         </div>
                          <ul style="margin-top: 60px !important" class="navbar-nav mr-sm-5 mt-2 mt-lg-0">
                            <li class="nav-item active">
                              <a class="nav-link"  href="{{route('accueil')}}" id="mynav1">Accueill<span class="sr-only">(current)</span></a>
                            </li>
                          
                                
                                <li class="nav-item">
                                  <a class="nav-link" href="{{url('/localisation')}}" id="mynav1">Geolocalisation</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{url('/localisation')}}" id="mynav1">Application mobile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{url('/localisation')}}" id="mynav1">Les ecoles</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('question') }}" id="mynav1">Questions/reponses</a>
                                </li>
                              </ul>
                              <form class="form-inline my-lg-0">
                                <input class="form-control" type="text" placeholder="recherche">
                                <button class="btn btn-success my-2 my-sm-0" type="submit">recherche</button>
                              </form>
                            </div>
                     </nav>
                           <div class="alert alert-success marouf">
                           <h3 class="col-md-8">
                    
                           IslamApp La plate forme d'apprentissage et connaissance de l'islam</h3>

                            <div class="mydiv2">
                            @yield('theme')
                            </div>
                                
                           
                              </div>
                             
                              <div class="container">
                             
                                      <div class="row row-offcanvas row-offcanvas-right">
                                 
                                  @yield('container')
                                  @include('include.sidebardroite')
                                  
                              </div>
                             
                            </div>
                            @include('include.footervue')
                            <script src="{{ asset('js/jquery.js') }}"></script>
                            <script src="{{ asset('js/bootstrap.js') }}"></script>
                         <script src="{{ asset('js/mdb.min.js') }}"></script>
                         @yield('script.map')
                        @yield('script')
        </body>
</html>