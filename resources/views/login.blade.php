<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <style>
       .bg-login-image {
            background: url('/image/login.png') no-repeat center center;
            background-size: cover;
            height: 100%;
            min-height: 400px; 
            width: 100%;
            border-radius: 0 10px 10px 0;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <body style="background-color: #D8BFD8; color:white;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-8"> 
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="d-inline-flex align-items-center">
                                        <img src="{{ asset('image/logokarya.png') }}" alt="Logo" style="width: 100px; height: 100px; margin-right: 10px;">
                                        <h1 class="h4 text-gray-900 mb-4 m-0" style="color: #a195c7; font-weight: bold; font-size: 30px; line-height: 20px;">ABSENSI</h1>
                                    </div>

                                    <form action="{{ route('proses_login') }}" method="POST" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="text" value="{{ old('email') }}" name="email" placeholder="Email"
                                            value="{{ old('email') }}"
                                            style="background-color: #D8BFD8; border: 1px solid #f7f7f8;">
                                            @error('email')
                                                <div class="text-danger mt-1 text-sm">{{ $message }}</div>
                                            @enderror
                                        </div><br>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="Your Password"
                                            style="background-color: #D8BFD8; border: 1px solid #f7f7f8;">
                                            @error('password')
                                                <div class="text-danger mt-1 text-sm">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary w-100" 
                                                 style="background-color: #a195c7; border-color: #DFCDE1; border-radius: 15px; padding: 7px;">
                                                  Sign In
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="bg-login-image w-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
     
    @if(session('login_error'))
    <script>
        Swal.fire({
            title: 'Oopss..',
            icon: 'error',
            text: '{{ session("login_error") }}'
        });
    </script>
    @endif
    
  </body>
</html>
