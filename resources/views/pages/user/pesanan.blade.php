<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pesanan Saya</title>
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
          <li class="breadcrumb-item active">Pesanan Saya</li>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#semua-pesanan">Semua</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#belum-bayar">Belum Bayar</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sedang-dikemas">Sedang Dikemas</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dikirim">Dikirim</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#selesai">Selesai</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dibatalkan">Dibatalkan</button>
                </li>
              </ul>

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active " id="semua-pesanan">
                  @if (count($semua_pesanan))            
                    <div class="row">
                      @foreach ($semua_pesanan as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                <p style="color: #254336">{{ $item->produk->brand->nama_pabrik }}</p>
                                @if ($item->status_pembayaran == 'belum bayar')
                                  <p class="text-danger">{{ $item->status_pesanan }}</p>
                                @elseif($item->status_pembayaran == 'sudah bayar' && $item->status_pesanan == 'menunggu pembayaran')
                                  <p class="text-danger">menunggu konfirmasi</p>
                                @elseif ($item->status_pesanan == 'selesai')
                                  <p class="text-success">{{ $item->status_pesanan }}</p>
                                @else
                                  <p class="text-danger">{{ $item->status_pesanan }}</p>
                                @endif
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{ asset('assets/img/produk/'.$item->produk->foto_produk) }}" alt="{{ $item->produk->foto_produk }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }}
                                    </b>
                                    
                                      x {{ $item->jumlah }}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{ $item->harga }} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      <p> {{ $item->total }} </p>
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pembayaran === 'belum bayar' )
                                <div class="d-flex justify-content-between">
                                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#payment-cancel<?php echo $item->id?>"> Batalkan Pesanan </button>
                                  <div class="modal fade" id="payment-cancel<?php echo $item->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Batal Pemesanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin untuk membatalkan pesanan yang telah anda buat?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Batal</button>
                                                <a href="/cancel-payment/{{ $item->id }}" class="btn btn-success text-white shadow-none">Yakin</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  @if ($item->bukti_pembayaran == null)
                                    <a class="btn btn-danger" href="/payment/{{ $item->id }}">Bayar Sekarang</a>
                                  @endif
                                </div>
                              @endif
                              @if ($item->status_pesanan === 'dikirim' )
                                <div class="d-flex justify-content-center">
                                  <a class="btn btn-success my-3" href="/pesanan-terima/{{ $item->id }}">Terima</a>
                                </div>
                              @endif
                              @if ($item->status_pesanan === 'selesai' )
                                @if ($item->ratingProduk === null)        
                                  <div class="d-flex justify-content-center">
                                    <a style="background-color: #254336; padding:5px 50px; border-radius: 5px" href="/rating/{{ $item->id }}">Rating</a>
                                  </div>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh">
                      <div>
                        <img src="{{ asset('assets/img/logo/tidak-ada-pesanan.jpg') }}" alt="tidak ada pesanan">
                        <p class="text-center"> Belum ada pesanan </p>
                      </div>
                    </div> 
                  @endif
                </div>

                <div class="tab-pane fade pt-3" id="belum-bayar">
                  @if (count($belum_bayar))           
                    <div class="row">
                      @foreach ($belum_bayar as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                <p style="color: #254336">{{ $item->produk->brand->nama_pabrik }}</p>
                                <p class="text-danger">{{ $item->status_pesanan }}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{ asset('assets/img/produk/'.$item->produk->foto_produk) }}" alt="{{ $item->produk->foto_produk }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }}
                                    </b>
                                    
                                      x {{ $item->jumlah }}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{ $item->harga }} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      <p> {{ $item->total }} </p>
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pembayaran === 'belum bayar' )
                                <div class="d-flex justify-content-between">
                                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cancel-payment<?php echo $item->id?>"> Batalkan Pesanan </button>
                                  <div class="modal fade" id="cancel-payment<?php echo $item->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Batal Pemesanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin untuk membatalkan pesanan yang telah anda buat?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Batal</button>
                                                <a href="/cancel-payment/{{ $item->id }}" class="btn btn-success text-white shadow-none">Yakin</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <a class="btn btn-danger" href="/payment/{{ $item->id }}">Bayar Sekarang</a>
                                </div>
                              @endif
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh">
                      <div>
                        <img src="{{ asset('assets/img/logo/tidak-ada-pesanan.jpg') }}" alt="tidak ada pesanan">
                        <p class="text-center"> Belum ada pesanan </p>
                      </div>
                    </div> 
                  @endif
                </div>

                <div class="tab-pane fade pt-3" id="sedang-dikemas">
                  @if (count($dikemas))                   
                    <div class="row">
                      @foreach ($dikemas as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                <p style="color: #254336">{{ $item->produk->brand->nama_pabrik }}</p>
                                <p class="text-danger">{{ $item->status_pesanan }}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{ asset('assets/img/produk/'.$item->produk->foto_produk) }}" alt="{{ $item->produk->foto_produk }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }}
                                    </b>
                                    
                                      x {{ $item->jumlah }}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{ $item->harga }} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      <p> {{ $item->total }} </p>
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh">
                      <div>
                        <img src="{{ asset('assets/img/logo/tidak-ada-pesanan.jpg') }}" alt="tidak ada pesanan">
                        <p class="text-center"> Belum ada pesanan </p>
                      </div>
                    </div> 
                  @endif
                </div>

                <div class="tab-pane fade pt-3" id="dikirim">
                  @if (count($dikirim))                    
                    <div class="row">
                      @foreach ($dikirim as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                <p style="color: #254336">{{ $item->produk->brand->nama_pabrik }}</p>
                                <p class="text-danger">{{ $item->status_pesanan }}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{ asset('assets/img/produk/'.$item->produk->foto_produk) }}" alt="{{ $item->produk->foto_produk }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }}
                                    </b>
                                    
                                      x {{ $item->jumlah }}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{ $item->harga }} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      <p> {{ $item->total }} </p>
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pesanan === 'dikirim' )
                                <div class="d-flex justify-content-center">
                                  <a class="btn btn-success my-3" href="">Terima</a>
                                </div>
                              @endif
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div> 
                  @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh">
                      <div>
                        <img src="{{ asset('assets/img/logo/tidak-ada-pesanan.jpg') }}" alt="tidak ada pesanan">
                        <p class="text-center"> Belum ada pesanan </p>
                      </div>
                    </div> 
                  @endif
                </div>

                <div class="tab-pane fade pt-3" id="selesai">
                  @if (count($selesai))
                    <div class="row">
                      @foreach ($selesai as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                <p style="color: #254336">{{ $item->produk->brand->nama_pabrik }}</p>
                                <p class="text-success">{{ $item->status_pesanan }}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{ asset('assets/img/produk/'.$item->produk->foto_produk) }}" alt="{{ $item->produk->foto_produk }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }}
                                    </b>
                                    
                                      x {{ $item->jumlah }}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{ $item->harga }} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      <p> {{ $item->total }} </p>
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pesanan === 'selesai' )
                                <div class="d-flex justify-content-center">
                                  <a style="background-color: #254336; padding:5px 50px; border-radius: 5px" href="/rating/{{ $item->id }}">Rating</a>
                                </div>
                              @endif
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh">
                      <div>
                        <img src="{{ asset('assets/img/logo/tidak-ada-pesanan.jpg') }}" alt="tidak ada pesanan">
                        <p class="text-center"> Belum ada pesanan </p>
                      </div>
                    </div> 
                  @endif
                </div>

                <div class="tab-pane fade pt-3" id="dibatalkan">
                  @if (count($dibatalkan))
                    <div class="row">
                      @foreach ($dibatalkan as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                <p style="color: #254336">{{ $item->produk->brand->nama_pabrik }}</p>
                                <p class="text-danger">{{ $item->status_pesanan }}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{ asset('assets/img/produk/'.$item->produk->foto_produk) }}" alt="{{ $item->produk->foto_produk }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }}
                                    </b>
                                    
                                      x {{ $item->jumlah }}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{ $item->harga }} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      <p> {{ $item->total }} </p>
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh">
                      <div>
                        <img src="{{ asset('assets/img/logo/tidak-ada-pesanan.jpg') }}" alt="tidak ada pesanan">
                        <p class="text-center"> Belum ada pesanan </p>
                      </div>
                    </div> 
                  @endif
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
  
</body>

</html>