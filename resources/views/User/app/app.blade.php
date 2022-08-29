
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UpConstruction Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <!-- Favicons -->
  <link href="/template-user/assets/img/favicon.png" rel="icon">
  <link href="/template-user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/template-user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/template-user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/template-user/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/template-user/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/template-user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/template-user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/template-user/assets/css/main.css" rel="stylesheet">

 
</head>

<body>

    @include('User.layout.header')

  <main id="main">

    @yield('content')

  </main>

  @include('User.layout.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  @stack('addon-script')
  
    <!-- Vendor JS Files -->
  <script src="/template-user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/template-user/assets/vendor/aos/aos.js"></script>
  <script src="/template-user/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/template-user/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/template-user/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/template-user/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/template-user/assets/vendor/php-email-form/validate.js"></script>

  <script src="/template-user/assets/js/main.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBNUmHx3Et1_3SI2gQOe23vG0olB5cAmkk&callback=initMap"></script>
  
  @stack('prepand-script')

</body>

</html>