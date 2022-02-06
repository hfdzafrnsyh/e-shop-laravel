<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online-kaeshop</title>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owl/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owl/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  
       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary  fixed-top">
        <a class="navbar-brand text-danger" href="#">Online-kaeshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link text-danger" href="/">Home </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-danger" href="/#about">About</a>
            </li>
             <!-- Authentication Links -->
             @guest
             @if (Route::has('login'))  
             <li class="nav-item">
                     <a class="nav-link text-danger" href="{{ route('login') }}">{{ __('Login') }}</a>
                 </li>
             @endif
         @else
             <li class="nav-item dropdown">
              <li class="nav-item active">
                <a class="nav-link text-danger" href="/user/{{Auth::user()->username}}/cart"><i class="fas fa-shopping-cart">{{Auth::user()->cart()->count()}}</i></a>
              </li>    
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }}
                 </a>
                

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="/user/{{Auth::user()->username}}">Profile</a>
                  <a class="dropdown-item" href="/user/{{Auth::user()->username}}/password">Password</a>

                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    
                 </div>
             </li>
         @endguest
            
            <ul>
            
        </div>
      </nav>



      <section>
        @yield('content')
      </section>



      <footer>
          <div class="footer">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6 copyright-footer">
                  <p>Copyright&copy;Develop by <span>@hfdz</span></p>
                </div>
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-4 contact-footer text-center">
                      <p><i class="fas fa-phone"></i> 0800-9090-0909</p>
                      <p><i class="fas fa-envelope"></i> anonim@test.id</p>
                    </div>
                    <div class="col-sm-4 link-footer text-center">
                      <ul>
                        <li>
                          <a href="/">Home</a>
                        </li>
                        <li>
                          <a href="#about">About</a>
                        </li>
                        <li>
                          <p>Image by <a href="https://www.freepik.com/" target="blank">Freepik</a></p>
                        </li>
                        <li>
                          <p>Image by <a href="https://www.google.com">Google</a></p>
                        </li>
                        <li>
                          <p>Icon by <a href="https://www.flaticon.com/">Flaticon</a></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </footer>


      

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>      
    @include('sweetalert::alert')

      @yield('footer')

    </body>
</html>