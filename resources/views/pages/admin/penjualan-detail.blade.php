<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ auth()->user()->role }} - {{ $title  }}</title>
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
        <a class="nav-link collapsed" href="/dashboard">
            <i class="bi bi-bar-chart-line-fill"></i>
            <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#profile" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bag-plus-fill"></i><span>Katalog Produk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="profile" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('pabrik.index') }}">
              <i class="bi bi-circle"></i><span>Informasi Pabrik</span>
            </a>
          </li>
          <li>
            <a href="{{ route('kategori.index') }}">
              <i class="bi bi-circle"></i><span>Kategori Produk</span>
            </a>
          </li>
          <li>
            <a href="{{ route('produk.index') }}">
              <i class="bi bi-circle"></i><span>Daftar Produk</span>
            </a>
          </li>
          <li>
            <a href="{{ route('inventaris.index') }}">
              <i class="bi bi-circle"></i><span>Pendataan Barang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link" href="/penjualan">
            <i class="bi bi-box2-fill"></i>
            <span>Informasi Penjualan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/kritik-saran">
          <i class="bi bi-star-fill"></i>
          <span>Kritik Saran</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('carousel.index') }}">
          <i class="bi bi-images"></i>
          <span>Carousel</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('petugas.index') }}">
          <i class="bi bi-people-fill"></i>
          <span>Petugas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/setting">
            <i class="bi bi-gear-fill"></i>
            <span>Setting</span>
        </a>
      </li>

      
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{ $title }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/penjualan">{{ $title }}</a></li>
          <li class="breadcrumb-item active">{{ $sub_title }}</li>
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
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive m-3">
                    <h4 class="fw-bold"> Informasi Detail Produk </h4>
                    <table>
                        <tr>
                          <th> Produk </th>
                          <td style="width: 50px; text-align: center"> : </td>
                          <td> {{ $pesanan->produk->nama_produk }} </td>
                        </tr>
                        <tr>
                          <th> Brand </th>
                          <td style="width: 50px; text-align: center"> : </td>
                          <td> {{ $pesanan->produk->brand->nama_pabrik }} </td>
                        </tr>
                        <tr>
                          <th> Kategori  </th>
                          <td style="width: 50px; text-align: center"> : </td>
                          <td> {{ $pesanan->produk->kategori->nama_kategori }} </td>
                        </tr>
                        <tr>
                          <th> Harga </th>
                          <td style="width: 50px; text-align: center"> : </td>
                          <td> {{ $pesanan->harga }} </td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="table-responsive m-3">
                    <h4 class="fw-bold"> Informasi Pesanan </h4>
                    <table>
                      <tr>
                        <th> Tanggal Pembelian </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td> {{ $pesanan->created_at->format('d F Y') }} </td>
                      </tr>
                      <tr>
                        <th> Jumlah Item </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td> {{ $pesanan->jumlah }} </td>
                      </tr>
                      <tr>
                        <th> Total Harga </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td> {{ $pesanan->total }} </td>
                      </tr>
                      <tr>
                        <th> Pesan </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td> 
                          @if ($pesanan->pesan != null)
                            {{ $pesanan->pesan }} 
                          @else
                            -
                          @endif
                        </td>
                      </tr>
                      {{-- <tr>
                        <th> Metode Pembayaran </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td> {{ $pesanan->metode_pembayaran }} </td>
                      </tr> --}}
                      <tr>
                        <th> Status Pesanan </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td>
                          @if($pesanan->status_pesanan  == 'menunggu pembayaran')
                              <span class="badge rounded-pill bg-secondary">{{ $pesanan->status_pesanan  }}</span>
                          @elseif($pesanan->status_pesanan  == 'dikemas')
                              <span class="badge rounded-pill bg-info">{{ $pesanan->status_pesanan  }}</span>
                          @elseif($pesanan->status_pesanan  == 'dikirim')
                              <span class="badge rounded-pill bg-primary">{{ $pesanan->status_pesanan  }}</span>
                          @elseif($pesanan->status_pesanan  == 'dibatalkan')
                              <span class="badge rounded-pill bg-danger">{{ $pesanan->status_pesanan  }}</span>
                          @elseif($pesanan->status_pesanan  == 'selesai')
                              <span class="badge rounded-pill bg-success">{{ $pesanan->status_pesanan  }}</span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th> Status Pembayaran </th>
                        <td style="width: 50px; text-align: center"> : </td>
                        <td> {{ $pesanan->status_pembayaran }} </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <hr>

              <h4 class="fw-bold"> Informasi Ulasan </h4>
              @if ($pesanan->ratingProduk == null)
                  <p class="m-3"> Pembeli Belum Memberikan Ulasan </p>
              @else                  
                <div class="table-responsive m-3">
                  <table>
                    <tr>
                      <th> Pembeli </th>
                      <td style="width: 50px; text-align: center"> : </td>
                      <td> {{ $pesanan->user->name }} </td>
                    </tr>
                    <tr>
                      <th> Rating </th>
                      <td style="width: 50px; text-align: center"> : </td>
                      <td>
                        @if ($pesanan->ratingProduk->rating == 5)
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        @elseif ($pesanan->ratingProduk->rating == 4)
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        @elseif ($pesanan->ratingProduk->rating == 3)
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        @elseif ($pesanan->ratingProduk->rating == 2)
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        @elseif ($pesanan->ratingProduk->rating == 1)
                          <i class="bi bi-star-fill"></i>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th> Ulasan </th>
                      <td style="width: 50px; text-align: center"> : </td>
                      <td> {{ $pesanan->ratingProduk->ulasan }} </td>
                    </tr>
                  </table>
                </div>
              @endif

              <div class="d-flex justify-content-center align-items-center my-3">
                <a href="/penjualan" class="btn btn-outline-success">Kembali</a>
              </div>

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
  
</body>

</html>