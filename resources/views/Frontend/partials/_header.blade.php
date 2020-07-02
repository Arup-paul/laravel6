<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

        <!-- Bootstrap core C SS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
        <link href="{{asset('css/style.css')}}" rel="stylesheet" >




        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="blog.css" rel="stylesheet">
    </head>


<body>
    <div class="container">

     <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">@current_time</a>
      </div>
      <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="#">ss</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('posts.all')}}">All Post</a>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('register')}}">Register</a>
        <a class="btn btn-sm btn-outline-secondary" href="{{route('userLogin')}}">Login</a>
      </div>
    </div>
  </header>
