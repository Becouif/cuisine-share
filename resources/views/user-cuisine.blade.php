@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (Session::has('message'))
                    <p>{{Session::get('message')}}</p>
                  @endif
            <div class="card">
                <div class="card-header fw-bold">manage your cuisine</div>

                <div class="card-body">

                <table class="table">
                  <thead>
                    <tr class="table-secondary">
                      <th scope="col">#</th>
                      <th scope="col">Cuisine Name</th>
                      <th scope="col">Continent</th>
                      <th scope="col">Image</th>
                      <th scope="col">Recipe</th>
                      <th scope="col">Steps</th>
                      <th scope="col">action</th>

                    </tr>
                  </thead>
                  <tbody>

                      @if (count($cuisines)>0)
                        @foreach ($cuisines as $key=>$cuisine)
                      <tr >
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$cuisine->cuisine_name}}</td>
                        <td>{{ $cuisine->continent->name }}</td>
                        <td ><img src="{{asset('cuisine-image')}}/{{$cuisine->image}}" width="60" alt=""></td>
                        <td>{{$cuisine->recipe}}</td>
                        <td>{{$cuisine->steps}}</td>
                        <td><form action="{{route('cuisine.destroy',[$cuisine->id])}}" method="post"> @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
                        
                      </tr>
                        @endforeach

                      @else
                      <td><p>No Cuisine Available</p></td>
                      
                      @endif

                 
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
