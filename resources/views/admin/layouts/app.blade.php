<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}"/>

</head>
<body class="d-flex">
    <div id="app" class="w-100 d-flex flex-column">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel p-0">
            <div class="container-fluid m-0 p-0">
                <div class="row w-100 m-0">
                    <div class="col-2 w-100 text-center">
                        <a class="navbar-brand text-white" href="{{ url('/admin') }}">
                            <b>{{ ucfirst(config('app.name', 'Laravel')) }}</b> backoffice
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-10">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item text-white">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item text-white">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid h-100 p-0 d-flex">
            <div class="row m-0 w-100">
                <div class="menu-col col-2 px-0">
                    <aside class="main-menu bg-dark h-100">
                        <ul class="nav flex-column">
                            <li class="nav-item {{ currentRoute(route('dashboard_admin')) }}">
                                <a class="nav-link" href="{{ route('dashboard_admin') }}"><i class="fas fa-sitemap fa-fw"></i> Tableau de bord</a>
                            </li>
                            <li class="nav-item {{ currentRoute(route('pages.index')) }}">
                                <a class="nav-link" href="{{ route('pages.index') }}"><i class="fas fa-pager fa-fw"></i> Pages</a>
                            </li>
                            <li class="nav-item {{ currentRoute(route('headers.index')) }}">
                                <a class="nav-link" href="{{ route('headers.index') }}"><i class="fas fa-heading fa-fw"></i> En-têtes</a>
                            </li>
                            <li class="nav-item {{ currentRoute(route('posts.index')) }}">
                                <a class="nav-link" href="{{ route('posts.index') }}"><i class="far fa-newspaper fa-fw"></i> Articles</a>
                            </li>
                            <li class="nav-item {{ currentRoute(route('images.index')) }}">
                                <a class="nav-link" href="{{ route('images.index') }}"><i class="far fa-images fa-fw"></i> Médias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-compass fa-fw"></i> Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-users fa-fw"></i> Utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="far fa-hand-paper fa-fw"></i> Rôles</a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="main-col col-10 h-100">
                    <main class="py-4 h-100 d-flex flex-column">
                        <div class="row justify-content-end">
                            <div class="col-12 px-4">
                                <div class="text-right text-secondary">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-end">
                                            <li class="breadcrumb-item">
                                              <i class="fa fa-home"></i>
                                              <a href="{{route('index_admin')}}">Home</a>
                                            </li>
                                            @for($i = 2; $i <= count(Request::segments()); $i++)
                                                @if ($i == count(Request::segments()))
                                                    <li class="breadcrumb-item active" aria-current="page">{{ Request::segment($i) }}</li>
                                                @else    
                                                    <li class="breadcrumb-item">                                                
                                                        <a href="">{{ Request::segment($i) }}</a>
                                                    </li>
                                                @endif
                                            @endfor
                                        </ol>
                                    </nav>
                                </div>                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-left">@yield('page-title')</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" id="block-alert">                                
                                    @isset($success)
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Opération reussie.</strong> {{ $success }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endisset
                                    @isset($error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Une erreur est survenue.</strong> {{ $error }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endisset
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        @yield('content')
                    </main>    
                </div>
            </div>
        </div>
        
    </div> 
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script>
        // traitement de l'attribut selected des balises select
        $(document).on("change","select",function(){
                $("option[value=" + this.value + "]", this)
                .attr("selected", true).siblings()
                .removeAttr("selected")
            });
        // preview background-image
        $(() => {           
            $('#bgImg').on('change', (e) => {
                let that = e.currentTarget;
                let imgUrl = $('#bgImg option:selected').attr('data-imgurl');
                $('#preview').attr('src', imgUrl);
            });
            $('#rounded_img').on('change', (e) => {
                let that = e.currentTarget;
                let imgUrl = $('#rounded_img option:selected').attr('data-imgurl');
                $('#preview_2').attr('src', imgUrl);
            });
        }); 
    </script>
    @yield('page-script')
</body>
</html>
