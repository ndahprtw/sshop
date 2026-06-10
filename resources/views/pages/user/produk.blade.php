<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{ asset('assets/landing/css/variables.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/css/variables-blue.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/css/variables-green.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/css/variables-orange.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/css/variables-purple.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/css/variables-red.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/css/variables-pink.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/landing/css/main-product.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
      <div class="container-fluid d-flex align-items-center justify-content-between">
  
        <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          {{-- <img src="{{ asset('assets/img/logo/title-logo.png') }}" alt=""> --}}
          <h1 style="background: #254336; color: #B7B597; padding: 5px; border-radius:10px;">Sherenity Shine</h1>
        </a>
  
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="/#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="/#partnership">Partnership</a></li>
            <li><a class="nav-link scrollto" href="/#product">Product</a></li>
            <li><a class="nav-link scrollto" href="/#testimonials">Testimonials</a></li>
            <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
            @if (empty(auth()->user()))
                <li> <a class="btn-getstarted scrollto" href="/login">Get Started</a> </li>
            @else
                <li class="dropdown">
                    <a class="btn-getstarted" href="">
                        {{auth()->user()->name}}

                        <i class="bi bi-chevron-down dropdown-indicator"></i>
                        {{-- <img src="{{ asset('assets/img/icon.jpg') }}" style="border-radius: 50%; width:25px; margin-right: 10px"> Keluar --}}
                    </a>
                    <ul>
                        <li><a href="/profile">Akun Saya</a></li>
                        <li><a href="/pesanan">Pesanan Saya</a></li>
                        <li><a href="/rating-sistem">Kritik dan Saran</a></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
            @endif
  
          </ul>
          <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
      </div>
    </header><!-- End Header -->

    <main id="main">
        <section id="product" class="services" style="margin-top: 75px; min-height: 100vh">
            <div class="container" data-aos="fade-up">
      
                @if (count($produk))
                    <div class="row gy-5">

                        @foreach ($produk as $item)
                            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                            <div class="service-item">
                                <div class="img">
                                <img src="{{ asset('assets/img/produk/'.$item->foto_produk) }}" alt="{{ $item->foto_produk }}" class="img-fluid" style="border: 1px solid black; min-height: 300px">
                                </div>
                                <div class="details position-relative">
                                    <h3>{{ $item->nama_produk }}</h3>
                                    <div class="d-flex justify-content-between align-items-center" >
                                        <p>Rp. {{ $item->harga }}</p> 
                                        <p>20 Terjual</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center" >
                                        <a class="checkout" href="/payment-product/{{ $item->id }}"> beli sekarang </a>
                                        <a class="checkout2" href="/detail-product/{{ $item->id }}"> <i class="bi bi-arrow-right-circle"></i> </a>
                                    </div>
                                </div>
                            </div>
                            </div><!-- End Service Item -->
                        @endforeach
          
                    </div>
            
                    <div class="text-center py-5">
                        <i>
                            <p> Anda Telah Melihat Semua Produk Kami </p>
                        </i>
                    </div>
                @else

                    <div class="d-flex justify-content-center align-items-center text-center text-danger" style="min-height: 50vh">
                        <i>
                            <p> Produk Belum Tersedia </p>
                        </i>
                    </div>
                    
                @endif
      
            </div>
        </section>
    </main>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-legal text-center">
        <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                  &copy; Copyright <strong><span>Sherenity Shine</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                  <!-- All the links in the footer should remain intact. -->
                  <!-- You can delete the links only if you purchased the pro version. -->
                  <!-- Licensing information: https://bootstrapmade.com/license/ -->
                  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                  2024 | Designed by <a href="mailto:indhpratw@gmail.com" target="_blank">indhpratw@gmail.com</a>
                </div>
              </div>
      
            </div>

        </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/landing/js/main.js') }}"></script>

</body>

</html>