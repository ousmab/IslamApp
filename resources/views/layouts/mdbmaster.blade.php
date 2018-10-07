<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('mdbcss/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mdbcss/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mdbcss/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mdbcss/mystyle.css') }}" rel="stylesheet">
</head>

<body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">
                    <strong class="blue-text">IslamApp</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Accueill
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Theme Islamique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/getting-started/" target="_blank">Geolocalisation des mosquee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank">Application mobille</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
	
    <main class="mt-5 pt-5">
        @yield('masection')
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">
 <div class="info-color-dark text-center py-4">
    <!--Newsletter-->
    <a id="footer-link-newsletter" href="/newsletter/" class="border rounded p-2 px-3 mr-4 d-none d-md-inline-block">Newsletter
      <i class="fa fa-envelope white-text ml-2"> </i>
    </a>
	<!-- Material input -->

    <!--Newsletter-->
    <a id="footer-link-affiliate" href="/mdb-affiliate-program/" class="border rounded p-2 px-3 mr-4 d-none d-md-inline-block">Affiliate program
      <i class="fa fa-money white-text ml-2"> </i>
    </a>
    <!--Contact-->
    <a id="footer-link-contact" href="/contact" data-toggle="modal" data-target="#contactForm" class="border rounded p-2 px-3 mr-4 d-none d-md-inline-block">Contact
      <i class="fa fa-envelope white-text ml-2"> </i>
    </a>
  </div>
  

      <!--Grid row-->
      

        <!--Grid column-->
      
        <!--Grid column-->

        <!--Grid column-->
		
        <center><div class="col-md-6 mb-4">
     </br></br><center>
          <form class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Your email" aria-label="Your email" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-sm btn-outline-white" type="button">Sign up</button>
            </div>
          </form>

        </div></center>
        <!--Grid column-->

      
      <!--Grid row-->

    
        <!--Call to action-->
       
        <!--/.Call to action-->

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="https://www.facebook.com/mdbootstrap" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>

            <a href="https://twitter.com/MDBootstrap" target="_blank">
                <i class="fa fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
                <i class="fa fa-youtube mr-3"></i>
            </a>

          
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> IslamApp </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{asset('mdbcss/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('mdbcss/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('mdbcss/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('mdbcss/js/mdb.min.js')}}"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
    <!-- JQuery -->
   
</body>

</html>