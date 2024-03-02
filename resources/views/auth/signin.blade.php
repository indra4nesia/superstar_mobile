<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Superstar Fitness Management">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Title -->
    <title>Member - Superstar Fitness Management</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('assets/img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('assets/img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ URL::asset('assets/img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('assets/img/icons/icon-180x180.png') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/baguetteBox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/rangeslider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/vanilla-dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/apexcharts.css') }}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ URL::asset('assets/manifest.json') }}">
  </head>
  <body>
    <!-- Preloader -->
    <div id="preloader">
      <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
    </div>
    <!-- Internet Connection Status -->
    <!-- # This code for showing internet connection status -->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <!-- validation input::manual me -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <span class="d-block">{{ $error }}</span>
          @endforeach
        </div>
        @endif
        <div class="text-center px-4">
          <img class="login-intro-img" src="{{ URL::asset('assets/img/logo/logo_sstar.png') }}" alt="">
        </div>
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Member Superstar Fitness.</h6>
          <form method="POST" action="{{ URL('auth/signin') }}">
            @csrf
            <div class="form-group">
              <input name="email" class="form-control" type="text" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group position-relative">
              <input name="password" class="form-control" id="psw-input" type="password" placeholder="Enter Password">
              <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i class="bi bi-eye-slash"></i></div>
            </div>
            <button class="btn w-100" style="background-color: black; color: white;" type="submit">
              <i class="fa fa-sign-in"></i>
              Sign In
            </button>
          </form>
        </div>
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <!-- <p class="mt-4">Didn't have an account? <a class="stretched-link" href="{{ url('auth/signup') }}">Register Now</a></p> -->
          <!-- <a class="stretched-link forgot-password d-block mb-1" href="{{ url('auth/forgot') }}">Forgot Password?</a> -->
        </div>
      </div>
    </div>
    <!-- All JavaScript Files -->
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slideToggle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/internet-status.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ URL::asset('assets/js/baguetteBox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/countdown.js') }}"></script>
    <script src="{{ URL::asset('assets/js/rangeslider.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vanilla-dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/magic-grid.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dark-rtl.js') }}"></script>
    <script src="{{ URL::asset('assets/js/active.js') }}"></script>
    <!-- PWA -->
    <script src="{{ URL::asset('assets/js/pwa.js') }}"></script>
  </body>
</html>