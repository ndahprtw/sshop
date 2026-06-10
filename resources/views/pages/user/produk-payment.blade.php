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
  {{-- <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
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
  
        <a href="/" data-bs-toggle="modal" data-bs-target="#cancel-payment" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          {{-- <img src="{{ asset('assets/img/logo/title-logo.png') }}" alt=""> --}}
          <h1 style="background: #254336; color: #B7B597; padding: 5px; border-radius:10px;">Sherenity Shine</h1>
        </a>
  
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/#hero">Home</a></li>
            <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/#partnership">Partnership</a></li>
            <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/#product">Product</a></li>
            <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/#testimonials">Testimonials</a></li>
            <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/#contact">Contact</a></li>
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
                    <li><a data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/profile">Akun Saya</a></li>
                    <li><a data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/pesanan">Pesanan Saya</a></li>
                    <li><a data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/rating-sistem">Kritik dan Saran</a></li>
                    <li><a data-bs-toggle="modal" data-bs-target="#cancel-payment" href="/logout">Logout</a></li>
                    </ul>
                </li>
            @endif
  
          </ul>
          <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
      </div>
    </header><!-- End Header -->

    <main id="main">
        <section id="product" class="pricing" style="margin-top: 75px; min-height: 100vh;">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 align-items-center justify-content-center">
        
                  <div class="col-lg-8" data-aos="zoom-in" data-aos-delay="600">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pricing-item">
                
                                        <div class="img">
                                            <img src="{{ asset('assets/img/produk/'.$produk->foto_produk) }}" alt="{{ $produk->foto_produk }}" class="img-fluid">
                                        </div>
                
                                        <div class="mx-3">
                
                                            <h3>{{ $produk->nama_produk }}</h3>

                                            <table>
                                                <tr>
                                                    <th> Harga </th>
                                                    <td style="width: 75px; text-align:center"> : </td>
                                                    <td> Rp. {{ $produk->harga }} </td>
                                                </tr>
                                                <tr>
                                                    <th> Stok Barang </th>
                                                    <td style="width: 75px; text-align:center"> : </td>
                                                    <td> {{ $produk->stok }} </td>
                                                </tr>
                                                <tr>
                                                    <th> Terjual </th>
                                                    <td style="width: 75px; text-align:center"> : </td>
                                                    <td> 25 produk </td>
                                                </tr>
                                                <tr>
                                                    <th> Brand </th>
                                                    <td style="width: 75px; text-align:center"> : </td>
                                                    <td> {{ $produk->brand->nama_pabrik }} </td>
                                                </tr>
                                                <tr>
                                                    <th> Kategori Produk </th>
                                                    <td style="width: 75px; text-align:center"> : </td>
                                                    <td> {{ $produk->kategori->nama_kategori }} </td>
                                                </tr>
                                            </table>

                                            <div class="d-flex justify-content-center align-items-center">
                                                <button style="margin: 25px 0px" type="button" class="btn btn-outline-secondary shadow-none" data-bs-toggle="modal" data-bs-target="#cancel-payment"> Kembali </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pricing-item">
                
                                        <div class="mx-3">
                                            
                                            <h5 class="text-center m-3"> <b> Pembayaran Produk </b> </h5>
                    
                                            <div class="card">
                                                <div class="card-body">
                                                    <form action="/penjualan" method="post" name="autoSumForm">
                                                        @csrf

                                                        <input type="hidden" name="produk_id" class="form-control shadow-none" value="{{ $produk->id }}">

                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="harga" class="form-label fw-bold">Harga</label>
                                                                <input type="number" name="harga" id="harga" class="form-control shadow-none" value="{{ $produk->harga }}" disabled>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="jumlah" class="form-label fw-bold">Jumlah</label>
                                                                <input type="number" name="jumlah" min="0" max="{{ $produk->stok }}" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror shadow-none" value="{{ old('jumlah') }}" placeholder="tersedia {{ $produk->stok }} item">
                                                                @error('jumlah') 
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div> 
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label class="form-label fw-bold">Total</label>
                                                                <input type="number" name="total" id="total" class="form-control @error('total') is-invalid @enderror shadow-none" readonly value="{{ old('total') }}">
                                                                @error('total') 
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div> 
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="alamat" class="form-label fw-bold">Alamat</label>
                                                                <textarea name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror shadow-none"> {{ auth()->user()->address }} </textarea>
                                                                @error('alamat') 
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div> 
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="pesan" class="form-label fw-bold">Pesan</label>
                                                                <textarea name="pesan" rows="2" class="form-control shadow-none"> {{ old('pesan') }} </textarea>
                                                            </div>
                                                            <div class="col-md-12 d-flex justify-content-between">
                                                                <button type="button" class="btn btn-outline-secondary shadow-none" data-bs-toggle="modal" data-bs-target="#cancel-payment"> Cancel </button>
                                                                <button type="submit" class="btn btn-outline-success shadow-none">Buat Pesanan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div><!-- End Pricing Item -->
        
                </div>
        
              </div>
        </section>


        {{-- modal cancel --}}
        <div class="modal fade" id="cancel-payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Batal Pemesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin untuk keluar dari halaman pembayaran? Data yang telah diinputkan akan hilang !
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Batal</button>
                        <a href="/" class="btn btn-success text-white shadow-none">Yakin</a>
                    </div>
                </div>
            </div>
        </div>

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
                  Designed by <a href="mailto:indhpratw@gmail.com" target="_blank">indhpratw@gmail.com</a>
                </div>
              </div>
      

        </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/landing/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaInput = document.getElementById('harga');
            const jumlahInput = document.getElementById('jumlah');
            const totalInput = document.getElementById('total');

            function calculateTotal() {
                const harga = parseFloat(hargaInput.value) || 0;
                const jumlah = parseInt(jumlahInput.value) || 0;
                const total = harga * jumlah;
                totalInput.value = total;
            }

            jumlahInput.addEventListener('input', calculateTotal);
        });
    </script>

</body>

</html>