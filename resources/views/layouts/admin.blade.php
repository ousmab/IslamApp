<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IslamApp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
     <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bootstrap-iso.css') }}" rel="stylesheet">
     <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
     <link href="{{ asset('css/stylejq.css') }}" rel="stylesheet">
     <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse" id="personav">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'IslamApp') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
                @guest
                  
                  @else
                  @include('include.sidebar_admin')
                  @endguest
              <div class=" col-md-16 col-md-offset-2 main">
              @yield('content')
              </div>
           </div>
          </div>  
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script>
    //fonction pour afficher ou cacher les sous menus de administration
    function afficher(idvaleur)
               {
                if($(idvaleur).is(":hidden"))
                        {
                            $(idvaleur).show();
                        }
                        else{
                            $(idvaleur).hide();
                        }
               }
      $( function() {
		$( "#datepicker1,#datepicker2" ).datepicker({
			showWeek: true,
			firstDay: 1,
            dateFormat: 'yy-mm-dd'
		});
	} );
    </script>
         @yield('monjs')
      <script>
      $('#navcach').click(function(){
             var id='#ulmenu';
                afficher(id);
                /*$('#ulmenu').show();
                      if($('#ulmenu').is(":hidden"))
                        {
                            $('#ulmenu').show();
                        }
                        else{
                            $('#ulmenu').hide();
                        } */
              });
      </script>
      @yield('script.question')
       <script>
        $('#navquestion').click(function(){
             var id='#ulmenu2';
                afficher(id);
        });
       </script>
       @yield('script.question2')
       @yield('script.reponse')
</body>
</html>
