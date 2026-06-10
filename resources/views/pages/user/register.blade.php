<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="logo">
    
    <!-- Eksternal CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Icons - Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        @media only screen and (max-width: 768px) {            
            .left-konten {
                height: 75px;
                margin: 10px 0px 20px;
                overflow: hidden;
            }
        }
    </style>
  </head>
  <body style="background-color: #254336">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 m-2 p-3 bg-white shadow w-80">
            <div class="header-text mb-4">
                <h3 class="text-center"> Registrasi Data </h3>
                <hr>
            </div>
            <form action="/register" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mx-2">
                    <!-- Name input -->
                    <div class=" col-md-6 mb-2">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror shadow-none" id="nama" value="{{ old('nama') }}">
                    @error('nama') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>
    
                    <!-- Email input -->
                    <div class=" col-md-6 mb-2">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror shadow-none" id="email" value="{{ old('email') }}">
                    @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>
                </div>

                <div class="row mx-2">
                    <!-- Profile input -->
                    <div class="col-md-6 mb-2">
                    <label class="form-label" for="profile">Profile | 3 x 3</label>
                    <input type="file" name="profile" class="form-control @error('profile') is-invalid @enderror shadow-none" id="profile" value="{{ old('profile') }}" accept="image/*">
                    @error('profile') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>

                    <!-- Date input -->
                    <div class="col-md-6 mb-2">
                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror shadow-none" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>                    
                </div>

                <div class="row mx-2">
                    <!-- Telepon input -->
                    <div class="col-md-6 mb-2">
                    <label class="form-label" for="telepon">Telepon</label>
                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror shadow-none" id="telepon" value="{{ old('telepon') }}" placeholder="6282.......">
                    @error('telepon') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>

                    <!-- Gender input -->
                    <div class="col-md-6 mb-2">
                    <label class="form-label" for="gender">Jenis Kelamin</label>
                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>Laki - Laki</option>
                        <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>  
                </div>

                <div class="row mx-2">
                    <!-- Alamat input -->
                    <div class="col-md-6 mb-2">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror shadow-none" id="alamat" value="{{ old('alamat') }}">
                    @error('alamat') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>

                    <!-- Password input -->
                    <div class="col-md-6 mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror shadow-none" id="password" value="{{ old('password') }}">
                    @error('password') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Eksternal JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Box Icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>