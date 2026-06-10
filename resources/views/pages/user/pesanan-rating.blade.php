<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pesanan Saya - Rating</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="logo">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">

  <style>
    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    }

    .rating > input{ display:none;}

    .rating > label {
        width: 1em;
        font-size: 3vw;
        color: #FFD600;
        cursor: pointer;
    }
    .rating > label::before{ 
    content: "\2605";
    position: absolute;
    opacity: 0;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
    opacity: 1 !important;
    }

    .rating > input:checked ~ label:before{
    opacity:1;
    }

    .rating:hover > input:checked ~ label:before{ opacity: 0.4; }

    @media only screen and (max-width: 600px) {
      .rating > label {
          font-size: 10vw; 
      }
    }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        {{-- <a href="index.html" class="logo d-flex align-items-center"> --}}
          <img src="{{ asset('assets/img/logo/title-logo.png') }}" alt="logo"  class="logo d-flex align-items-center" style="height:45px">
        {{-- </a> --}}
        <i class="bi bi-list toggle-sidebar-btn" style="color: #B7B597"></i>
      </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if ( auth()->user()->profile != null)
                <img src="{{ asset('assets/img/user/'.auth()->user()->profile) }}" alt="Profile" class="rounded-circle">
            @else
                <img src="{{  asset('assets/img/logo/icon-profile.jpeg')  }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: #B7B597">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/">
                <i class="bi bi-house"></i>
                <span>Home</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

   <!-- ======= Sidebar ======= -->
   <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/">
            <i class="bi bi-house"></i>
            <span>Halaman Utama</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/profile">
            <i class="bi bi-person-circle"></i>
            <span>Akun Saya</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/pesanan">
          <i class="bi bi-receipt"></i>
          <span>Pesanan Saya</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/rating-sistem">
          <i class="bi bi-star-fill"></i>
          <span>Kritik Saran</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li>
        
      
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pesanan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/pesanan">Pesanan Saya</a></li>
          <li class="breadcrumb-item active">Rating</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @elseif (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
                {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered justify-content-between">

                <li class="nav-item">
                  <a class="nav-link" href="/pesanan#semua-pesanan">Semua</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/pesanan#belum-bayar">Belum Bayar</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/pesanan#sedang-dikemas">Sedang Dikemas</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/pesanan#dikirim">Dikirim</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/pesanan#selesai">Selesai</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/pesanan#dibatalkan">Dibatalkan</a>
                </li>
              </ul>

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active " id="semua-pesanan">
                  <div class="row">
                      <div class="col-md-6 my-3">
                        <div class="card">
                          <div class="card-body my-4">
                            <div class="d-flex justify-content-between align-item-center">
                              <p style="color: #254336">{{ $pesanan->produk->brand->nama_pabrik }}</p>
                              <p style="color: red">{{ $pesanan->status_pesanan }}</p>
                            </div>

                            <div class="row">
                              <div class="col-md-3">
                                <img src="{{ asset('assets/img/produk/'.$pesanan->produk->foto_produk) }}" alt="{{ $pesanan->produk->foto_produk }}" class="img-fluid">
                              </div>
                              <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                  <b>
                                    {{ $pesanan->produk->nama_produk }}
                                  </b>
                                  
                                    x {{ $pesanan->jumlah }}
                                </div>
                                <p class="d-flex justify-content-end"> 
                                  {{ $pesanan->harga }} 
                                  <hr>
                                  <div class="d-flex justify-content-between">
                                    <p> Total Pesanan : </p>
                                    <p> {{ $pesanan->total }} </p>
                                  </div>
                                </p>
                              </div>
                            <hr>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="card">
                          <div class="card-body">
                            <form action="/rating" method="post">
                              @csrf
                              <input type="hidden" value="{{ $pesanan->id }}" name="pembelian" class="btn btn-outline-dark w-100 shadow-none col-md-6 mb-3">
                              <div class="rating my-2">
                                  <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                              </div>
                              <textarea rows="4" name="testimoni" class="form-control shadow-none col-md-6 mb-3" required></textarea>
                              <input type="submit" value="kirim" class="btn btn-outline-dark w-100 shadow-none col-md-6 mb-3">
                          </form>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Sherenity Shine</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      2024 | Designed by <a href="mailto:indhpratw@gmail.com" target="_blank">indhpratw@gmail.com</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main_lte.js') }}"></script>
  
  <script>
    var $star_rating = $('.star-rating .fa');

    var SetRatingStar = function() {
    return $star_rating.each(function() {
        if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
        return $(this).removeClass('fa-star-o').addClass('fa-star');
        } else {
        return $(this).removeClass('fa-star').addClass('fa-star-o');
        }
    });
    };

    $star_rating.on('click', function() {
    $star_rating.siblings('input.rating-value').val($(this).data('rating'));
    return SetRatingStar();
    });

    SetRatingStar();
    $(document).ready(function() {

    });
  </script>
</body>

</html>