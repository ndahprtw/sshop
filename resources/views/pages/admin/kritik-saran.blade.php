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
        <ul id="profile" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
        <a class="nav-link collapsed" href="/penjualan">
            <i class="bi bi-box2-fill"></i>
            <span>Informasi Penjualan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/kritik-saran">
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
          <li class="breadcrumb-item active">{{ $title }}</li>
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
          @elseif (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
                <b> Permintaan Ditolak ! </b> {{ session('warning') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">

              <div class="m-3">
                <h5 class="card-title">Total : {{ count($ulasan) }} Ulasan</h5>
              </div>
              
              <div class="table-responsive">
                <table class="table datatable" id="pabrik">
                  <thead>
                    <tr class="text-center">
                      <th> No.  </th>
                      <th> Tanggal </th>
                      <th> User </th>
                      <th> Rating  </th>
                      <th> Ulasan </th>
                      <th> Aksi  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ulasan as $item)
                        <tr>
                          <td> {{ $no++ }} </td>
                          <td>{{ $item->created_at->format('d F Y') }}</td>
                          <td> {{ $item->user->name }} </td>
                          <td>
                            @if ($item->rating == 5)
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            @elseif ($item->rating == 4)
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            @elseif ($item->rating == 3)
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            @elseif ($item->rating == 2)
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            @elseif ($item->rating == 1)
                                <i class="bi bi-star-fill"></i>
                            @endif
                          </td>
                          <td> {{ $item->ulasan }} </td>                        
                          <td>
                            <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item->id?>"><i class="bi bi-trash-fill"></i></button>
                            <div class="modal fade" id="hapus<?php echo $item->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-center">Konfirmasi Hapus Ulasan</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p style="color: black">Apakah anda yakin untuk menghapus ulasan terkait ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                            <form action="/kritik-saran/{{ $item->id }}" method="POST" style="display: inline;">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
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