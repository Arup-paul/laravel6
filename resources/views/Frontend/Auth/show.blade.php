@extends('frontend/layouts.master')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sl</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Profile Photo</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $key => $user)
        <tr>
        <td>{{$key}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td><img src="{{url('uploads/'.$user->profile_photo)}}" width="60px;" alt=""></td>
        <td><a class="btn btn-primary" href="{{route('details',$user->id)}}">Details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection