<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cuisine-Share</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Cuisine-Share
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                            <li class="nav-item">
                                <a href="{{route('cuisine.create')}}" class="nav-link">Add Cuisine</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cuisine.index')}}" class="nav-link">View Cuisine</a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <p id="nav-link" class="nav-link" >
                                    {{ Auth::user()->username }}
                                </p>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container mt-5">
            <div class="row">
                <!-- start of foreach and if  -->
                @if (count($cuisines)>0)
                @foreach ($cuisines as $cuisine)
                    

                <div class="col-sm-6">
                    <div class="card">
                    <img class="" src="{{asset('cuisine-image')}}/{{$cuisine->image}}" width="100" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$cuisine->cuisine_name}}</h5>
                        <p class="card-text">{{$cuisine->steps}}</p>
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                    </div>
                </div>
               <!-- end of foreach  -->
               @endforeach
               @else 
               <p>no cuisine available</p>
               @endif
            </div>
            </div>
        </main>
    </div>
</body>

<style>
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
      overflow: hidden;
    }

    .card-img {
      height: 200px;
      object-fit: cover;
    }
  </style>
</html>
