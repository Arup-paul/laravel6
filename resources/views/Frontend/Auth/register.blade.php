@extends('frontend.layouts.master')


@section('content')

<a href="{{route('userList')}}" class="btn btn-primary">User List</a>
<form action="{{route('register')}}" method="post" enctype="multipart/form-data">
  @csrf
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
  @endif
  <div class="form-group">
      <label for="id1">Username</label>
  <input type="text" id="id1" value="{{old('username')}}" class="form-control" name="username" placeholder="Username">
  @if($errors->has('username'))
  <span class="text-danger">
      {{$errors->first('username')}}
  </span>
  @endif
  </div>
    <div class="form-group">
      <label for="id2">Email</label>
      <input type="text" id="id2" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
        @if($errors->has('email'))
  <span class="text-danger">
      {{$errors->first('email')}}
  </span>
  @endif
  </div>
    <div class="form-group">
      <label for="id3">Password</label>
      <input type="password" id="id3" class="form-control" name="password" placeholder="Password">
        @if($errors->has('password'))
  <span class="text-danger">
      {{$errors->first('password')}}
  </span>
  @endif
  </div>
    <div class="form-group">
      <label for="id4">Confirm Password</label>
      <input type="password" id="id4" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            @if($errors->has('password_confirmation'))
    <span class="text-danger">
        {{$errors->first('password_confirmation')}}
    </span>
    @endif
  </div>
     <div class="form-group">
      <label for="id5">Profile Photo</label>
      <input type="file" id="id5" class="form-control" name="profile_photo" >
         @if($errors->has('profile_photo'))
    <span class="text-danger">
        {{$errors->first('profile_photo')}}
    </span>
    @endif
      
  </div>
      <div class="form-group">
      <input type="submit" value="Submit" class="btn btn-primary">
  </div>
</form>

@endsection

