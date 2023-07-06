<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cuisine-Share</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <i style="font-size:30px" class="fa-solid fa-utensils card-title">Cuisine-Share</i>
                    
                     
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
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->username }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/user/edit/{{Auth::user()->id}}">Update username</a></li>
                                </ul>
                            </div>
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
            <!-- <div class="container"> -->
                <div class="row">
                    @if (count($cuisines)>0)
                    @foreach ($cuisines as $key=>$cuisine)
                    <div class="card m-5" style="width: 18rem;">
                        <img src="{{asset('cuisine-image')}}/{{$cuisine->image}}" width="110" height="250" class="card-img-top" alt="{{ $cuisine->cuisine_name }}">
                        <div class="card-body">
                            <h5 class="">{{$cuisine->cuisine_name}}</h5>
                            <p class="card-text">{{Str::limit($cuisine->steps,120)}}</p>
                            <a href="{{route('cuisine.view',[$cuisine->id])}}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                    @endforeach
                    @else 

                
                        <span id="no-cuisine" class=" text-center">
                        Oops! no cuisine found
                        </span>


                    @endif
                </div>
            <!-- </div> -->
            <span class="justify-content-center text-center pagination">{{ $cuisines->links() }}</span>
        </main>
    </div>
</body>

<footer>
<p class="mt-4" style="text-align: center"> Copyright &copy; <script>document.write(new Date().getFullYear())</script><a class="ms-1 copyright" href="">Becouif</a> All Rights Reserved</p>
</footer>
<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

.copyright{
    text-decoration:none;
    font-family: 'Roboto', sans-serif;
}


html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%; 
  background: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}

.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    /* border-radius: 2px; */
    /* box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);  */
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}

#no-cuisine{
    font-weight:400;
    padding:10px;
    font-size:20px;
    font-style:italic;
}

  </style>
</html>
