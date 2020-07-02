@include('frontend.partials._header')
@include('frontend.partials._slider')

@includeWhen(request()->is('/'), 'frontend.partials._jumbroton')


<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

 

    @yield('content')

    </div><!-- /.blog-main -->
   @include('frontend.partials._sidebar')

  </div><!-- /.row -->

</main><!-- /.container -->

@include('frontend.partials._footer')

