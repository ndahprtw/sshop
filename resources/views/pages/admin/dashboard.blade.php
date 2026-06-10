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
        <a class="nav-link" href="/dashboard">
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
        <a class="nav-link collapsed" href="/penjualan">
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
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Pemasukan</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ number_format($pemasukan, 0, ',', '.') }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Brand</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-buildings-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlah_brand }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-3 col-md-6">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Admin</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $admin }}</h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Customers Card -->
        <div class="col-xxl-3 col-md-6">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Rating</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-star-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ number_format($rating, 1) }}</h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"> Informasi Penjualan</h5>
                    <!-- Line Chart -->
                    <canvas id="grafik-penjualan" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            // Mengambil data dari server
                            let data_tanggal = {!! json_encode($data_tanggal) !!};
                            let jumlah_pembelian = {!! json_encode($jumlah_pembelian) !!};

                            new Chart(document.querySelector('#grafik-penjualan'), {
                                type: 'line',
                                data: {
                                    labels: data_tanggal,
                                    datasets: [{
                                        label: 'Jumlah Pembelian Perhari',
                                        data: jumlah_pembelian,
                                        fill: false,
                                        borderColor: 'black',
                                        tension: 0.1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- End Line CHart -->
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"> Informasi Kategori Produk </h5>

                    <!-- Doughnut Chart -->
                    <canvas id="grafik-kategori" style="max-height: 200px;"></canvas>
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                          let kategori = {!! json_encode($data_kategori) !!};
                          let jumlah_data = {!! json_encode($jumlah_data) !!};
                  
                          new Chart(document.querySelector('#grafik-kategori'), {
                              type: 'doughnut',
                              data: {
                                  labels: kategori, 
                                  datasets: [{
                                      label: 'Jumlah Produk per Kategori',
                                      data: jumlah_data,
                                      backgroundColor: [
                                          'rgb(255, 99, 132)',
                                          'rgb(54, 162, 235)',
                                          'rgb(255, 205, 86)'
                                      ],
                                      hoverOffset: 4
                                  }]
                              },
                              options: {
                                  plugins: {
                                      datalabels: {
                                          color: '#fff',
                                          formatter: (value, context) => {
                                              return context.chart.data.labels[context.dataIndex];
                                          }
                                      }
                                  }
                              }
                          });
                      });
                    </script>
                  
                    <!-- End Doughnut CHart -->

                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"> Informasi Brand </h5>

                    <!-- Doughnut Chart -->
                    <canvas id="grafik-pabrik" style="max-height: 200px;"></canvas>
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                          let brand = {!! json_encode($data_brand) !!};
                          let jumlah_data = {!! json_encode($jumlah_data_brand) !!};
                  
                          new Chart(document.querySelector('#grafik-pabrik'), {
                              type: 'doughnut',
                              data: {
                                  labels: brand, 
                                  datasets: [{
                                      label: 'Jumlah Produk per Brand',
                                      data: jumlah_data,
                                      backgroundColor: [
                                          'rgb(255, 99, 132)',
                                          'rgb(54, 162, 235)',
                                          'rgb(255, 205, 86)'
                                      ],
                                      hoverOffset: 4
                                  }]
                              },
                              options: {
                                  plugins: {
                                      datalabels: {
                                          color: '#fff',
                                          formatter: (value, context) => {
                                              return context.chart.data.labels[context.dataIndex];
                                          }
                                      }
                                  }
                              }
                          });
                      });
                    </script>
                  
                    <!-- End Doughnut CHart -->

                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"> Informasi Pesanan </h5>
                    <!-- Bar Chart -->
                    <canvas id="grafik-status-pesanan" style="min-height: 200px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            // Mengambil data dari server
                            let status = {!! json_encode($data_status) !!};
                            let jumlah_data = {!! json_encode($jumlah_data_pesanan) !!};

                            new Chart(document.querySelector('#grafik-status-pesanan'), {
                                type: 'bar',
                                data: {
                                    labels: status,
                                    datasets: [{
                                        data: jumlah_data,
                                          label: 'jumlah : ',
                                        backgroundColor: [
                                          'rgb(255, 99, 132)',
                                          'rgb(54, 162, 235)',
                                          'rgb(255, 205, 86)'
                                        ],
                                        borderColor: [
                                          'rgb(255, 99, 132)',
                                          'rgb(54, 162, 235)',
                                          'rgb(255, 205, 86)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- End Bar CHart -->

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