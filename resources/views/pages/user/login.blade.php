<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Eksternal CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo/circle-logo.png') }}" rel="logo">
    
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
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-konten">
              <picture>
                <source media="(max-width: 500px)" srcset="{{ asset('assets/img/logo/title-logo.png') }}">
                <img src="{{ asset('assets/img/logo/shape-logo.png') }}" class="img-fluid rounded" style="width: 250px;">
              </picture>
            </div>
            <div class="col-md-6">
                <div class="header-text mb-4">
                    <h3 class="text-center"> Login </h3>
                    <hr>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="POST">
                  @csrf
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                    @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon2"><i class='bx bxs-key'></i></span>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                      @error('password') 
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div> 
                      @enderror
                  </div>
                  <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6 mb-2"> Login </button>
                        <a href="/auth/google" class="btn btn-light border w-100 d-flex align-items-center justify-content-center">
                            <i class='bx bxl-google me-2'></i> Login dengan Google
                        </a>
                        <a href="{{ route('sso.redirect') }}" class="btn btn-light border w-100 d-flex align-items-center justify-content-center mt-2">
                            <i class='bx bx-shield-quarter me-2'></i> Login dengan SSO
                        </a>
                  </div>
                </form>
                <div class="text-center">
                    <small> Don't have account? <a href="/register"> Sign Up </a> </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Eksternal JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Box Icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>