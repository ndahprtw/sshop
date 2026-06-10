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
        <a class="nav-link" data-bs-target="#profile" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bag-plus-fill"></i><span>Katalog Produk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="profile" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('pabrik.index') }}" class="nav-link active">
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

              <div class="d-flex align-items-center justify-content-between m-3">
                <h5 class="card-title">Total : {{ count($pabrik) }} Brand</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-pabrik">
                  <i class="bi bi-plus-square"></i> Tambah
                </button>
              </div>

              <div class="table-responsive">
                <table class="table datatable" id="pabrik">
                  <thead>
                    <tr class="text-center">
                      <th> No.  </th>
                      <th> Logo  </th>
                      <th> Brand  </th>
                      <th> Produk  </th>
                      <th> Narahubung  </th>
                      <th> Aksi  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pabrik as $item)
                        <tr>
                          <td> {{ $no++ }} </td>
                          <td> 
                            <img src="{{ asset('assets/img/pabrik/'.$item->logo) }}" alt="{{ $item->logo }}" style="width: 150px; height: 150px; border:1px solid black">
                          </td>
                          <td> {{ $item->nama_pabrik }} </td>
                          <td> {{ $item->produk->count() }} tersedia </td>
                          <td>
                            @if ($item->whatsApp != null)
                              <a href="https://wa.me/{{ $item->whatsApp }}" target="_blank"> <i class="bi bi-whatsapp"></i> via WhatsApp </a> <br>
                            @endif
                            @if ($item->instagram != null)
                              <a href="https://instagram.com/{{ $item->instagram }}" target="_blank"> <i class="bi bi-instagram"></i> via Instagram </a> <br>
                            @endif
                            @if ($item->email != null)
                              <a href="mailto:{{ $item->email }}" target="_blank"> <i class="bi bi-envelope"></i> via Email </a>
                            @endif
                          </td>                          
                          <td>
                            {{-- <a href="{{ route('pabrik.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="ri-pencil-fill"></i></a> --}}
                            <button type="button" class="btn btn-primary btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item->id?>"><i class="ri-pencil-fill"></i></button>
                            <div class="modal fade" id="edit<?php echo $item->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <form action="{{ route('pabrik.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Edit Data Brand</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div>
                                        <label for="nama_pabrik" class="form-label">Brand</label>
                                        <input type="text" name="nama_pabrik" class="form-control @error('nama_pabrik') is-invalid @enderror shadow-none" id="nama_pabrik" value="{{ $item->nama_pabrik }}">
                                        @error('nama_pabrik') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div> 
                                        @enderror
                                      </div>
                                      <div class="col-md-3" style="margin-top: 10px">
                                        <img id="logo" src="{{ asset('assets/img/pabrik/'.$item->logo) }}" alt="{{ $item->logo }}" style="width: 100px; border:1px solid black">
                                      </div>
                                      <div class="col-md-9" style="margin-top: 10px">
                                        <label id="logo" class="form-label">Logo | 3 x 3</label>
                                        <input type="file"  id="logoInput" name="logo" class="form-control @error('logo') is-invalid @enderror shadow-none" id="logo" value="{{ $item->logo }}" accept="image/*">
                                        @error('logo') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div> 
                                        @enderror
                                      </div>
                                      <label id="logo" class="form-label" style="margin-top: 10px">Narahubung</label>
                                      <div>
                                        <div class="input-group" style="margin-top: 5px">
                                          <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                          <input type="text" name="whatsApp" class="form-control shadow-none" value="{{ $item->whatsApp }}" placeholder="Format : 62..........">
                                        </div>
                                      </div>
                                      <div style="margin-top: 5px">
                                        <div class="input-group">
                                          <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                          <input type="text" name="instagram" class="form-control shadow-none" value="{{ $item->instagram }}" placeholder="Username Instagram">
                                        </div>
                                      </div>
                                      <div style="margin-top: 5px">
                                        <div class="input-group">
                                          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                          <input type="text" name="email" class="form-control shadow-none" value="{{ $item->email }}" placeholder="Alamat Email">
                                        </div>
                                      </div>              
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                      <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                  </div>
                                  </div>
                              </form>
                              </div>
                            </div>

                            <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item->id?>"><i class="bi bi-trash-fill"></i></button>
                            <div class="modal fade" id="hapus<?php echo $item->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-center">Konfirmasi Hapus Brand Dari Katalog</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p style="color: black">Apakah anda yakin untuk menghapus <br> <b>{{ $item->nama_pabrik }}</b> beserta data terkait dari katalog ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                            <form action="{{ route('pabrik.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('pabrik.show', $item->id) }}" class="btn btn-info btn-sm"><i class="bi bi-chat-left-dots-fill"></i></a>
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

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah-pabrik" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
      <form action="{{ route('pabrik.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Tambah Data Brand</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div>
                <label for="nama_pabrik" class="form-label">Brand</label>
                <input type="text" name="nama_pabrik" class="form-control @error('nama_pabrik') is-invalid @enderror shadow-none" id="nama_pabrik" value="{{ old('nama_pabrik') }}">
                @error('nama_pabrik') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div> 
                @enderror
              </div>
              <div style="margin-top: 5px">
                <label id="logo" class="form-label">Logo | 3 x 3</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror shadow-none" id="logo" value="{{ old('logo') }}" accept="image/*">
                @error('logo') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div> 
                @enderror
              </div>
              <label id="logo" class="form-label" style="margin-top: 10px">Narahubung</label>
              <div>
                <div class="input-group" style="margin-top: 5px">
                  <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                  <input type="text" name="whatsApp" class="form-control shadow-none" value="{{ old('whatsApp') }}" placeholder="Format : 62..........">
                </div>
              </div>
              <div style="margin-top: 5px">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                  <input type="text" name="instagram" class="form-control shadow-none" value="{{ old('instagram') }}" placeholder="Username Instagram">
                </div>
              </div>
              <div style="margin-top: 5px">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="text" name="email" class="form-control shadow-none" value="{{ old('email') }}" placeholder="Alamat Email">
                </div>
              </div>              
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
          </div>
          </div>
      </form>
      </div>
    </div>

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

  <!-- DataTables -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
      $('.datatable').DataTable();
  });
  </script>

  <script>
  $(document).ready(function() {
      $('#pabrik').DataTable({
      "searching": true // Aktifkan fitur pencarian
      });
  });
  </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main_lte.js') }}"></script>

  <script>
    document.getElementById('logoInput').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('logo');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
    </script>
  
</body>

</html>