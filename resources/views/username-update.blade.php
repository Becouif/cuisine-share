@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-12">
  <form action="{{route('update.user',[$user->id])}}" method="post">@csrf
    @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" name="username" value="{{$user->username}}" class="form-control @error('username') is-invalid @enderror">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
  
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  </div>
</div>

@endsection