<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1>e-kerawanan<span>.</span></h1>
    </a>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="index.html" class="active">Home</a></li>
        {{-- <li><a href="about.html">About</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="projects.html">Projects</a></li>
        <li><a href="blog.html">Blog</a></li> --}}
        {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li> --}}
        {{-- <li><a href="contact.html">Contact</a></li> --}}
      </ul>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">

  @if(Route::current()->getName() == 'user.data-uji-gempa-lama' || Route::current()->getName() == 'user.data-uji-gempa-lama.proses-kalkulasi')
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/template-user/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
  
        <h2>Pengujian Data</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Data Gempa Lama</li>
        </ol>
  
      </div>
    </div><!-- End Breadcrumbs -->
  @else

  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 data-aos="fade-down"> Selamat Datang  <br><span> e-kerawanan </span></h2>
          <p data-aos="fade-up">website ini merupakan penelitian mahasiswa teknik informatika universitas bengkulu yang mana sistem ini menghasilkan referensi tingkat kerawanan disuatu titik berdasakan parameter-parameter dari bidang sipil dan object nya adalah gempa </p>
          <a data-aos="fade-up" data-aos-delay="200" href="{{ route('user.data-uji-gempa-lama') }}" class="btn-get-started">Pengujian Data</a>
        </div>
      </div>
    </div>
  </div>


  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

    <div class="carousel-item active" style="background-image: url(template-user/assets/img/hero-carousel/hero-carousel-1.jpg)"></div>
    <div class="carousel-item" style="background-image: url(template-user/assets/img/hero-carousel/hero-carousel-2.jpg)"></div>
    <div class="carousel-item" style="background-image: url(template-user/assets/img/hero-carousel/hero-carousel-3.jpg)"></div>
    <div class="carousel-item" style="background-image: url(template-user/assets/img/hero-carousel/hero-carousel-4.jpg)"></div>
    <div class="carousel-item" style="background-image: url(template-user/assets/img/hero-carousel/hero-carousel-5.jpg)"></div>

    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>
  </div>

  @endif


  
</section><!-- End Hero Section -->

