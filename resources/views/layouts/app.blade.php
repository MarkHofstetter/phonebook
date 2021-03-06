<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Phonebook') }}</title>

    <!-- Styles -->
<!--    <link rel="stylesheet" href="{{ URL::asset('/bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}"> -->
    <link rel="stylesheet" href="{{ URL::asset('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> 

    <!-- Scripts -->
    <script src="{{ URL::asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script> 
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <script>
        window.Phonebook = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Phonebook') }}
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
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
<!--                            <li><a href="{{ url('/register') }}">Register</a></li> -->
                        @else
                            <li><a href="{{ url('/user/update', Auth::user()) }}">{{ Auth::user()->name }}</a></li> 
                          <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                         <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                         </form>
                                    </li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

</body>
</html>
