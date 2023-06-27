@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
            <p class="alert alert-secondary">{{ Session::get('message') }}</p>
                
            @endif
            <div class="card">
                <div class="card-header">Add Cuisine</div>

                <div class="card-body">
                    <form action="{{route('cuisine.store')}}" method="post" enctype="multipart/form-data">@csrf


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Cuisine Name</label>
                                <input type="text" name="cuisine_name" class="form-control @error('cuisine_name') is-invalid @enderror" id="username" value="{{ old('cuisine_name') }}" placeholder="Cuisine name">
                                
                                @error('cuisine_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" >
                                
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Ingredients</label>
                            <textarea name="recipe" class="form-control @error('recipe') is-invalid @enderror" id="recipe">{{ old('recipe') }} </textarea>
                            
                            @error('recipe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Steps</label>
                            <textarea name="steps" class="form-control @error('steps') is-invalid @enderror" id="inputAddress2"> {{ old('steps') }} </textarea>
                            
                            @error('steps')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                           <!-- input for user id  -->
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly>
                            <div class="form-group">
                            <label for="continent">Continent</label>
                            <select name="continent_id" id="continent_id" class="form-control @error('continent_id') is-invalid @enderror">
                                <option value="">Choose Cuisine Continent</option>
                                @foreach (App\Models\Continent::all() as $continents)
                                <option value="{{$continents->id}}">{{$continents->name}}</option>

                                @endforeach
                            </select>
                            
                            @error('continent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                     
                        
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
