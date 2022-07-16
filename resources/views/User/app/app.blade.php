
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UpConstruction Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @stack('prepand-script')
  @include('user.layout.style')
  @stack('addon-script')

 
</head>

<body>

    @include('user.layout.header')

  <main id="main">

    @yield('content')

  </main>

  @include('user.layout.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  @stack('prepand-script')
  @include('user.layout.script')
  @stack('addon-script')


</body>

</html>