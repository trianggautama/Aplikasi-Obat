<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aplikasi Pendistribusian Obat</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/bootstrap.min.css')}}" >
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/fonts/font-awesome.min.css')}}">
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/fonts/simple-line-icons.css')}}">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/slicknav.css')}}">
    <!-- Menu CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/menu_sideslide.css')}}">
    <!-- Slider CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/slide-style.css')}}">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/nivo-lightbox.css')}}" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/animate.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/main.css')}}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('depan/css/responsive.css')}}">

  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
            <a href="/" class="navbar-brand text-dark"><b>Dinas Kesehatan Kota Banjarbaru</b></a>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="onepage-nev navbar-nav mr-auto w-100 justify-content-end clearfix">
              <li class="nav-item active">
                <a class="nav-link" href="#hero-area">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">
                  Visi dan Misi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">
                  Kontak
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{Route('login')}}">
                  Login
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="onepage-nev mobile-menu">
          <li>
            <a href="#hero-area">Home</a>
          </li>
          <li>
            <a href="#about">Visi dan Misi</a>
          </li>
          <li>
            <a href="#contact">Kontak</a>
          </li>
          <li>
            <a href="{{Route('login')}}">Login</a>
          </li>
        </ul>
        <!-- Mobile Menu End -->
      </nav>
      <!-- Navbar End -->

      <!-- Hero Area Start -->
      <div id="hero-area" class="hero-area-bg">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
              <div class="contents">
                <br>
                <img src="{{asset('pemko.png')}}" alt="" width="70px" class="mb-2">
                <br>
                <h1 class=" wow fadeInUp" data-wow-delay="0.4s">Aplikasi Pendistribusian Obat</h1>
                <p class=" wow fadeInUp" data-wow-delay="0.6s">Dinas Kesehatan Kota Banjarbaru</p>
                <div class="header-button wow fadeInUp" data-wow-delay="1s">
                  <a href="{{Route('login')}}" class="btn btn-common">Login User</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->

    <!-- About Section Start -->
    <section id="about" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="img-thumb wow fadeInLeft" data-wow-delay="0.3s">
              <img class="img-fluid" src="{{asset('hero.png')}}" alt="">
            </div>
          </div> 
          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="profile-wrapper wow fadeInRight" data-wow-delay="0.3s">
              <h4>Profil</h4>
              <p class="text-justify" >Dinas Kesehatan Kota Banjarbaru merupakan unsur pelaksana urusan pemerintahan bidang Kesehatan yang menjadi kewenangan daerah. Menurut Peraturan Walikota banjarbaru Nomor 50 Tahun 2016 pasal 4 secara umum Dinas Kesehatan Banjarbaru mempunyai tugas untuk membantu Walikota Banjarbaru melaksanakan urusan pemerintahan dalam bidang Kesehatan yang menjadi kewenangan daerah dan tugas pembantuan yang diberikan kepada Kota Banjarbaru. </p>
                <br>
              <h4>Visi dan Misi</h4>
              <p class="text-justify" >Dinas Kesehatan Kota Banjarbaru memiliki visi Terwujudnya pelayanan kesehatan yang holistik dan berkarakter, dengan sejumlah misi sebagai berikut: Meningkatkan kesehatan ibu dan anak serta gizi masyarakat, kesehatan lingkungan dan pemberdayaan masyarakat.</p>
            </div>
          </div>   
        </div>
      </div>
    </section>
    <!-- About Section End -->


    <!-- Contact Section Start -->
    <section id="contact" class="section-padding">      
      <div class="contact-form">
        <div class="container">
          <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.4s">          
            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="contact-block">
                <h2>Alamat</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15930.487422422906!2d114.8270671!3d-3.4418027!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93032670dd02d532!2sDinas%20Kesehatan%20Kota%20Banjarbaru!5e0!3m2!1sid!2sid!4v1627384333629!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="footer-right-area wow fadeIn">
                <h2>Kontak</h2>
                <div class="footer-right-contact">
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <p>San Francisco, CA</p>
                  </div>
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <p><a href="mailto:hello@tom.com">hello@tom.com</a></p>
                    <p><a href="mailto:tomsaulnier@gmail.com">tomsaulnier@gmail.com</a></p>
                  </div>
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <p><a href="#">+ (00) 123 456 789</a></p>
                    <p><a href="#">+ (00) 123 344 789</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>   
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Start -->
    <footer class="footer-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-text text-center wow fadeInDown" data-wow-delay="0.3s">
    
              <p>Copyright ©2021</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
      <i class="icon-arrow-up"></i>
    </a>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('depan/js/jquery-min.js')}}"></script>
    <script src="{{asset('depan/js/popper.min.js')}}"></script>
    <script src="{{asset('depan/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('depan/js/jquery.mixitup.js')}}"></script>
    <script src="{{asset('depan/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('depan/js/waypoints.min.js')}}"></script>
    <script src="{{asset('depan/js/wow.js')}}"></script>
    <script src="{{asset('depan/js/jquery.nav.js')}}"></script>
    <script src="{{asset('depan/js/jquery.easing.min.js')}}"></script>  
    <script src="{{asset('depan/js/nivo-lightbox.js')}}"></script>
    <script src="{{asset('depan/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('depan/js/main.js')}}"></script>
    <script src="{{asset('depan/js/form-validator.min.js')}}"></script>
    <script src="{{asset('depan/js/contact-form-script.min.js')}}"></script>
    <script src="{{asset('depan/js/map.js')}}"></script>
      
  </body>
</html>
