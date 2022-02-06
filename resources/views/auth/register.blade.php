<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('wp-kashop/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('wp-kashop/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body >


<div class="container">
  
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

      <div class="logo-text text-center mt-4 text-primary" >
          <h3 style="font-size:50px;">Register</h3>
          </div>

        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-body p-0 bg-primary">
            <!-- Nested Row within Card Body -->
            <div class="row">
         
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-white mb-4">Create Your Account</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('register') }}">
                  @csrf
                    <div class="form-group">
 
                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         
                      
                    </div>
                    <div class="form-group">
                            
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            
                     </div>
                    <div class="form-group">
                            
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            
                     </div>
                    
                     <div class="form-group">
                            
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                    </div>
              
                    
                    <button type="submit" class="btn btn-danger btn-user btn-block">
                      Register
                    </button>
                    <hr>
                  
                  </form>
                  <hr>
                  <!-- <div class="text-center ">
                  @if (Route::has('password.request'))
                  <a class="small text-primary" href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                    
                  </div> -->
                  <div class="text-center">
                  <a class="small text-white" href="/login">Back to Login</a>
             
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>


</div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('wp-kashop/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('wp-kashop/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('wp-kashop/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('wp-kashop/js/sb-admin-2.min.js')}}"></script>

</body>

</html>

