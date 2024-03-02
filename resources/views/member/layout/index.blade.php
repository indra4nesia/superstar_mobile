<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Affan - PWA Mobile HTML Template">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#0134d4">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Superstar Fitness</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="{{ url('assets/img/logo/GSG-06.png') }}">
        <link rel="apple-touch-icon" href="{{ url('assets/img/icons/icon-96x96.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('assets/img/icons/icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="167x167" href="{{ url('assets/img/icons/icon-167x167.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/icons/icon-180x180.png') }}">
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/tiny-slider.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/baguetteBox.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/rangeslider.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/vanilla-dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/apexcharts.css') }}">
        <script src="{{ url('assets/js/vanilla-dataTables.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="{{ url('assets/style.css') }}">
        <!-- Web App Manifest -->
        <link rel="manifest" href="{{ url('assets/manifest.json') }}">
    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        </div>
        <!-- Internet Connection Status -->
        <!-- # This code for showing internet connection status -->
        <div class="internet-connection-status" id="internetStatus"></div>
        <!-- Header Area -->
        <div class="header-area" id="headerArea">
            <div class="container">
                <!-- # Paste your Header Content from here -->
                <!-- # Header Five Layout -->
                <!-- # Copy the code from here ... -->
                <!-- Header Content -->
                <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                    <!-- Logo Wrapper -->
                    <div class="logo-wrapper">
                        <a href="{{ url('member/dashboard') }}">
                            <img src="{{ url('assets/img/logo/GSG-03.png') }}" alt="">
                        </a>
                    </div>
                    <!-- Navbar Toggler -->
                    <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas" data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
                </div>
                <!-- # Header Five Layout End -->
            </div>
        </div>
        <!-- # Sidenav Left -->
        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">
            <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <div class="offcanvas-body p-0">
                <!-- Side Nav Wrapper -->
                <div class="sidenav-wrapper">
                    <!-- Sidenav Profile -->
                    <div class="sidenav-profile bg-gradient">
                        <div class="sidenav-style1"></div>
                        <!-- User Thumbnail -->
                        <div class="user-profile">
                            <img
                                style="height: 70px; width: 70px; object-fit: cover;" 
                                src="{{ url('assets/img/logo/GSG-02.png') }}" alt="">
                        </div>
                        <!-- <div class="user-profile"><img src="{{ url('assets/img/bg-img/2.jpg') }}" alt=""></div> -->
                        <!-- User Info -->
                        <div class="user-info">
                            <h6 class="user-name mb-0">{{ Auth::user()->nama }}</h6>
                            <span class="d-block">
                                {{  \App\Http\Models\MemberTipeModel::where('id',Auth::user()->tipe_member)->first()->nama }}
                            </span>
                        </div>
                    </div>
                    <!-- Sidenav Nav -->
                    <ul class="sidenav-nav ps-0">
                        <li>
                            <a href="{{ url('member/dashboard') }}">
                                <i class="bi bi-house-door"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <!-- <a href="{{ url('scan') }}"> -->
                            <a href="{{ url('member/scan') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                                <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                                <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                                <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                                <path d="M12 9h2V8h-2v1Z"/>
                                </svg> 
                                <span style="margin-left: 13px">Scan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-collection"></i>
                                History
                            </a>
                            <ul>
                                <li><a href="{{ url('member/history/check_in') }}">Check In - GYM</a></li>
                                <li><a href="{{ url('member/history/session_with_pt') }}">Check In - Session</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('member/profile') }}">
                                <i class="bi bi-person"></i>
                                Profile</a>
                        </li>
                        <li>
                            <a href="{{ url('auth/signout') }}" onclick="return confirm('Are you sure ?')">
                                <i class="bi bi-box-arrow-right"></i>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                    <!-- Social Info -->
                </div>
            </div>
        </div>
        <!-- end::navbar -->
        <div class="page-content-wrapper">
            @yield('content')
        </div>
        <!-- Footer Nav -->
        <div class="footer-nav-area" id="footerNav">
            <div class="container px-0">
                <!-- =================================== -->
                <!-- Paste your Footer Content from here -->
                <!-- =================================== -->
                <!-- Footer Content -->
                <div class="footer-nav position-relative">
                    <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                        <li class="{{ request()->is('member/dashboard') ? 'active' : '' }}">
                            <a href="{{ url('member/dashboard') }}">
                                <svg class="bi bi-house" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                                </svg>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('member/class/list') ? 'active' : '' }}">
                            <a href="{{ url('member/class/list') }}">
                                <svg fill="#000000" height="30" width="30" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                     viewBox="0 0 301.015 301.015" xml:space="preserve">
                                <g>
                                <g>
                                <path d="M296.075,128.44H279.11v-22.88c0-2.665-2.21-4.875-4.875-4.875H246.74V77.74c0-2.665-2.21-4.875-4.875-4.875h-32.37
                                      c-2.665,0-4.875,2.21-4.875,4.875v50.7H95.485v-50.7c0-2.665-2.21-4.875-4.875-4.875H58.24c-2.665,0-4.875,2.21-4.875,4.875v22.88
                                      H25.87c-2.665,0-4.875,2.21-4.875,4.875v22.88H4.875c-2.665,0-4.875,2.21-4.875,4.875v33.67c0,2.665,2.21,4.875,4.875,4.875H21.06
                                      v23.725c0,2.665,2.21,4.875,4.875,4.875H53.43v22.88c0,2.665,2.21,4.875,4.875,4.875h32.37c2.665,0,4.875-2.21,4.875-4.875V171.73
                                      h109.135v51.545c0,2.665,2.21,4.875,4.875,4.875h32.37c2.665,0,4.875-2.21,4.875-4.875v-22.88H274.3
                                      c2.665,0,4.875-2.21,4.875-4.875v-23.725h16.965c2.665,0,4.875-2.21,4.875-4.875v-33.67
                                      C300.95,130.585,298.74,128.44,296.075,128.44z M21.06,162.11H9.75v-0.065V138.19h11.31V162.11z M53.43,190.71H30.81v-80.275
                                      h22.62V190.71z M85.735,218.465h-22.62V82.615h22.62V218.465z M204.62,162.11H95.485v-0.065V138.19H204.62V162.11z
                                      M236.99,218.465h-22.62V82.615h22.62V218.465z M269.36,190.71h-22.62v-80.275h22.62V190.71z M291.2,162.045h-12.09V138.19h12.09
                                      V162.045z"/>
                                </g>
                                </g>
                                </svg>
                                <span>Class</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('member/scan') ? 'active' : '' }}">
                            <a href="{{ url('member/scan') }}">
                                <!-- <li class="{{ request()->is('member/myqrcode') ? 'active' : '' }}"> -->
                                <!-- <a href="{{ url('member/myqrcode') }}"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                                <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                                <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                                <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                                <path d="M12 9h2V8h-2v1Z"/>
                                </svg>
                                <span>Scan</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('member/history/') ? 'active' : '' }}">
                            <a href="{{ url('member/history/') }}">
                                <svg class="bi bi-collection" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"></path>
                                </svg>
                                <span>History</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('member/profile') ? 'active' : '' }}">
                            <a href="{{ url('member/profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                                <span>Profile</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- All JavaScript Files -->
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/slideToggle.min.js') }}"></script>
        <script src="{{ url('assets/js/internet-status.js') }}"></script>
        <script src="{{ url('assets/js/tiny-slider.js') }}"></script>
        <script src="{{ url('assets/js/baguetteBox.min.js') }}"></script>
        <script src="{{ url('assets/js/countdown.js') }}"></script>
        <script src="{{ url('assets/js/rangeslider.min.js') }}"></script>
        <script src="{{ url('assets/js/vanilla-dataTables.min.js') }}"></script>
        <script src="{{ url('assets/js/index.js') }}"></script>
        <script src="{{ url('assets/js/magic-grid.min.js') }}"></script>
        <script src="{{ url('assets/js/dark-rtl.js') }}"></script>
        <script src="{{ url('assets/js/active.js') }}"></script>
        <!-- PWA -->
        <script src="{{ url('assets/js/pwa.js') }}"></script>
    </body>

</html>