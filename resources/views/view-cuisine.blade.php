@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
          <!-- start of card  -->
          <div class="card">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{asset('cuisine-image')}}/{{ $cuisine->image }}" alt="Cuisine Image" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title fw-bold">{{$cuisine->cuisine_name}}</h5>
            <p class="card-text"><span class="fw-bold">Ingredients:</span> {{$cuisine->recipe}}</p>
            <ul>
              <li><span class="fw-bold">Step:</span> {{$cuisine->steps}}</li>

              <!-- Add more steps as needed -->
            </ul>
            <p class="card-text"><span class="fw-bold">Continent:</span> {{ $cuisine->continent->name }}</p>
            <p class="card-text"><span class="fw-bold">Added by:</span> {{$cuisine->user->username}}</p>
          </div>
        </div>
      </div>
    </div>
<!-- end of card  -->
        </div>
    </div>
</div>
@endsection
