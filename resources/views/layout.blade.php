<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('judul')</title>
    <meta name="description"
          content="Jahitin Academy Sebuah program pembelajaran real time untuk menambah dan meningkatkan kompetensi para penjahit lokal Indonesia berdasarkan kebutuhan market fashion Lokal maupun Internasional.">

    <!-- Jahitin CSS -->
    <link rel="stylesheet" href="{{ asset('css/jahitin.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap..min.css')}}">
    <!-- BoxIcons CSS -->
    <link rel="stylesheet" href="{{ asset('css/boxicons.min.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="{{ asset('css/odometer.min.css')}}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.min.css')}}">
    <!-- Viewer CSS -->
    <link rel="stylesheet" href="{{ asset('css/viewer.min.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

    <link rel="icon" type="image/jpg" href="{{ asset('img/favi.png')}}">

<script src="{{ asset('jquery-2.2.4.min.js')}}"></script>
    <script type="text/javascript">

    $(document).ready(function() {
        $("[data-trigger]").on("click", function(e){
            e.preventDefault();
            e.stopPropagation();
            var offcanvas_id =  $(this).attr('data-trigger');
            $(offcanvas_id).toggleClass("show");
            $('body').toggleClass("offcanvas-active");
            $(".screen-overlay").toggleClass("show");
        });

        // Close menu when pressing ESC
        $(document).on('keydown', function(event) {
            if(event.keyCode === 27) {
            $(".mobile-offcanvas").removeClass("show");
            $("body").removeClass("overlay-active");
            }
        });

        $(".btn-close, .screen-overlay").click(function(e){
            $(".screen-overlay").removeClass("show");
            $(".mobile-offcanvas").removeClass("show");
            $("body").removeClass("offcanvas-active");


        });
    }); // jquery end
    </script>
</head>

<body>

<div class="preloader">
    <div class="loader">
        <img src="{{ asset('img/jahitinLoader.gif')}}">
    </div>
</div>
<b class="screen-overlay"></b>
    <nav id="navbar_main" class="mobile-offcanvas navbar-expand-lg" style="background:#fff;">
        <div class="offcanvas-header">
            <button class="btn btn-close float-left"> </button>
            <div class="logo">
                    <img src="{{ asset('img/jahitin.png')}}" alt="logo" style="max-width:125px;padding:20px 10px;">
            </div>
        </div>
        <ul class="navbar-nav" style="padding-left:40px;font-family: 'Poppins', sans-serif !important;">
            <li class="nav-item" ><a href="{{ route('home')}}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">Beranda</a></li>
            <li class="nav-item"><a href="{{ route('tentang')}}"  class="nav-link {{ request()->is('tentang*') ? 'active' : '' }}">Tentang</a></li>
            <li class="nav-item"><a href="{{ route('workshop')}}" class="nav-link {{ request()->is('workshop*') ? 'active' : '' }}">Workshop</a></li>
            <li class="nav-item"><a href="{{ route('penjahit')}}" class="nav-link {{ request()->is('penjahit*') ? 'active' : '' }}">Penjahit</a></li>
            <li class="nav-item"><a href="http://store.jahitin.com" target="_blank" class="nav-link" >Shop</a></li>
        </ul>
    </nav>
<header class="header-area">
    <div class="navbar-area">
        <div class="raque-responsive-nav">
            <div class="container">
                <div class="raque-responsive-menu">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="logo1">
                                <div class="bs-offset-main bs-canvas-anim">
                                    <button class="btn btn-default" type="button" data-trigger="#navbar_main"
                                    style="font-size:20pt;">&#9776;</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" ><center>
                            <div class="logo">
                                <a href="{{ route('home')}}">
                                    <img src="{{ asset('img/jahitin.png')}}" alt="logo">
                                </a>
                            </div></center>
                        </div>
                        @if(Auth::guard('user')->check())
                        <div class="col-3">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;z-index:999;"><img class="rounded-circle" style="width:40px;height:40px;object-fit:cover;" src="{{ asset('images/user/'.Auth::guard('user')->user()->ava) }}" alt="User Image" onerror=this.src="{{ asset('images/user/icon.png') }}">
                        </a>
                        <div class="dropdown-menu" style="font-size:9pt;top: 20px; position:relative;">
                            <div class="container">
                                <div class="row justify-content-md-center"  style="margin:0;">
                                    <div class="col-md-9 align-self-center" style="padding:0px 10px 0px;">
                                    @if(Auth::guard('user')->user()->verifikasi == 1)
                                        <h6 style="font-size:9pt;margin:0;">{{ Auth::guard('user')->user()->fullname }}<img src="{{ asset('img/verif-icon.png')}}" alt="image" style="height:15px;position:absolute;"></h6>
                                    @else
                                        <h6 style="font-size:9pt;margin:0;">Halo, @if(isset(Auth::guard('user')->user()->fullname)) {{ Auth::guard('user')->user()->fullname }} @else <span>Penjahit</span> @endif</h6>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top:10px; margin-bottom:0px;">
                                <a href="{{ route('user.akun', ['nama' => Auth::guard('user')->user()->name]) }}" class="dropdown-item d-flex align-items-center"><span>Profil</span></a>
                                <a href="{{ route('riwayat') }}" class="dropdown-item d-flex align-items-center"> <span>Riwayat Aktivitas</span></a>
                                <a href="{{ route('password') }}" class="dropdown-item d-flex align-items-center"> <span>Ubah Kata Sandi</span></a>
                                <a href="{{ route('user.logout') }}" class="dropdown-item d-flex align-items-center"> <span>Logout</span></a>
                            </div>
                        </div>
                        @else
                            <div class="col-3" style="padding:0px;">
                                <a href="{{ route('user.loginpage') }}" style="position: relative;z-index: 999;"><span style="font-family:poppins;border:1px solid#000;padding:7px 15px;">Daftar</span></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="raque-nav" style="background:#fff;">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar">
                    <a class="navbar-brand" href="{{ route('home')}}">
                        <img src="{{ asset('img/jahitin.png')}}" style="height:40px;" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="{{ route('home')}}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">Beranda</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('tentang')}}" class="nav-link {{ request()->is('tentang*') ? 'active' : '' }}">Tentang</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('workshop')}}" class="nav-link {{ request()->is('workshop*') ? 'active' : '' }}">Workshop</a>
                                </li>
                            <li class="nav-item"><a href="{{ route('penjahit')}}" class="nav-link {{ request()->is('penjahit*') ? 'active' : '' }}">Penjahit</a>
                            </li>
                            <li class="nav-item"><a href="http://store.jahitin.com" target="_blank" class="nav-link" >Shop</a></li>
                        </ul>
                    </div>
                     @if(Auth::guard('user')->check())
                        <div class="top-header-btn" style="padding-right:20px;">
                            <div class="dropdown d-inline-block">
                                <?php 
                                    $fullname = explode(' ', Auth::guard('user')->user()->fullname); 
                                ?>
                                <button type="button" class="button-login7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Halo, @if(isset(Auth::guard('user')->user()->fullname)) {{ $fullname[0] }} @else <span>Penjahit</span> @endif
                                </button>
                                <div class="dropdown-menu" style="font-size:9pt;">
                                    <div class="container">
                                        <div class="row justify-content-md-center"  style="margin:0;width:100%;">
                                            <div class="col-md-3" style="padding:0px;">
                                               <center><img class="rounded-circle" style="width:35px;height:35px;object-fit:cover;" src="{{ asset('images/user/'.Auth::guard('user')->user()->ava) }}"
                                                alt="User Image" onerror=this.src="{{ asset('images/user/icon.png') }}"></center>
                                            </div>

                                            <div class="col-md-9 align-self-center" style="padding:5px 5px 10px;">
                                            @if(Auth::guard('user')->user()->verifikasi == 1)
                                                <h6 style="font-size:9pt;margin-bottom: 0;">{{ Auth::guard('user')->user()->fullname }}<img src="{{ asset('img/verif-icon.png')}}" alt="image" style="height:15px;position:absolute;"></h6>
                                            @else
                                                <h6 style="font-size:9pt;margin-bottom: 0;"> @if(isset(Auth::guard('user')->user()->fullname)) {{ Auth::guard('user')->user()->fullname }} @else <span>Penjahit</span> @endif </h6>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin-top:10px; margin-bottom:0px;">
                                        <a href="{{ route('user.akun', ['nama' => Auth::guard('user')->user()->name]) }}" class="dropdown-item d-flex align-items-center"><span>Profil</span></a>
                                        <a href="{{ route('riwayat') }}" class="dropdown-item d-flex align-items-center"> <span>Riwayat Aktivitas</span></a>
                                        <a href="{{ route('password') }}" class="dropdown-item d-flex align-items-center"> <span>Ubah Kata Sandi</span></a>
                                        <a href="{{ route('user.logout') }}" class="dropdown-item d-flex align-items-center"> <span>Logout</span></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="top-header-btn">
                            <a href="{{ route('user.loginpage') }}" style="padding:6px 20px;" class="default-btn">Daftar</a>
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>
    <div class="navbar-area header-sticky">
        <div class="raque-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home')}}">
                    <img src="{{ asset('img/jahitin-w.png')}}" style="height:40px;" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('home')}}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}" style="color:#fff;">Beranda</a></li>
                        <li class="nav-item"><a href="{{ route('tentang')}}" class="nav-link {{ request()->is('tentang*') ? 'active' : '' }}" style="color:#fff;">Tentang</a></li>
                        <li class="nav-item"><a href="{{ route('workshop')}}" class="nav-link {{ request()->is('workshop*') ? 'active' : '' }}" style="color:#fff;">Workshop</a></li>
                        <li class="nav-item"><a href="{{ route('penjahit')}}" class="nav-link {{ request()->is('penjahit*') ? 'active' : '' }}" style="color:#fff;">Penjahit</a></li>
                        <li class="nav-item"><a href="http://store.jahitin.com" target="_blank" class="nav-link" style="color:#fff;">Shop</a></li>
                    </ul>
                </div>
                    @if(Auth::guard('user')->check())
                <div class="top-header-btn" style="padding-right:20px;">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="button-login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Halo, @if(isset(Auth::guard('user')->user()->fullname)) {{ $fullname[0] }} @else <span>Penjahit</span> @endif
                        </button>
                        <div class="dropdown-menu" style="font-size:9pt;">
                            <div class="container">
                                <div class="row justify-content-md-center"  style="margin:0;width:100%;">
                                    <div class="col-md-3" style="padding:0px;">
                                       <center><img class="rounded-circle" style="width:35px;height:35px;object-fit:cover;" src="{{ asset('images/user/'.Auth::guard('user')->user()->ava) }}" alt="User Image" onerror=this.src="{{ asset('images/user/icon.png') }}"></center>
                                    </div>

                                    <div class="col-md-9 align-self-center" style="padding:5px 5px 10px;">
                                    @if(Auth::guard('user')->user()->verifikasi == 1)
                                        <h6 style="font-size:9pt;margin: 0;">{{ Auth::guard('user')->user()->fullname }}<img src="{{ asset('img/verif-icon.png')}}" alt="image" style="height:15px;position:absolute;"></h6>
                                    @else
                                        <h6 style="font-size:9pt;margin: 0;">@if(isset(Auth::guard('user')->user()->fullname)) {{ Auth::guard('user')->user()->fullname }} @else <span>Penjahit</span> @endif</h6>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top:10px; margin-bottom:0px;">
                                <a href="{{ route('user.akun', ['nama' => Auth::guard('user')->user()->name]) }}" class="dropdown-item d-flex align-items-center"><span>Profil</span></a>
                                <a href="{{ route('riwayat') }}" class="dropdown-item d-flex align-items-center"> <span>Riwayat Aktivitas</span></a>
                                <a href="{{ route('password') }}" class="dropdown-item d-flex align-items-center"> <span>Ubah Kata Sandi</span></a>
                                <a href="{{ route('user.logout') }}" class="dropdown-item d-flex align-items-center"> <span>Logout</span></a>
                        </div>
                    </div>
                </div>
            @else
                <div class="top-header-btn">
                    <a href="{{ route('user.loginpage') }}" style="padding:6px 20px;background: #fff;color: #7e1037;" class="default-btn">Daftar</a>
                </div>
            @endif
                </nav>
            </div>
        </div>
    </div>
    <div class="raque-responsive-nav header-sticky">
        <div class="container">
            <div class="raque-responsive-menu">
                <div class="row align-items-center">
                    <div class="col-3">
                        <div class="logo1">
                            <div class="bs-offset-main bs-canvas-anim">
                                <button class="btn btn-default" type="button" data-trigger="#navbar_main"
                                style="font-size:20pt;color:#fff;">&#9776;</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" ><center>
                        <div class="logo">
                            <a href="{{ route('home')}}">
                                <img src="{{ asset('img/jahitin-w.png')}}" alt="logo">
                            </a>
                        </div></center>
                    </div>
                    @if(Auth::guard('user')->check())
                    <div class="col-3">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;z-index:999;"><img class="rounded-circle" style="width:40px;height:40px;object-fit:cover;" src="{{ asset('images/user/'.Auth::guard('user')->user()->ava) }}" alt="User Image" onerror=this.src="{{ asset('images/user/icon.png') }}">
                        </a>
                        <div class="dropdown-menu" style="font-size:9pt;top: 20px; position:relative;">
                            <div class="container">
                                <div class="row justify-content-md-center" style="margin:0;">
                                    <div class="col-md-9 align-self-center" style="padding:5px 10px 0px;">
                                    @if(Auth::guard('user')->user()->verifikasi == 1)
                                        <h6 style="font-size:9pt;margin: 0;">{{ Auth::guard('user')->user()->fullname }}<img src="{{ asset('img/verif-icon.png')}}" alt="image" style="height:15px;position:absolute;"></h6>
                                    @else
                                        <h6 style="font-size:9pt;margin: 0;">@if(isset(Auth::guard('user')->user()->fullname)) {{ Auth::guard('user')->user()->fullname }} @else <span>Penjahit</span> @endif</h6>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top:10px; margin-bottom:0px;">
                                <a href="{{ route('user.akun', ['nama' => Auth::guard('user')->user()->name]) }}" class="dropdown-item d-flex align-items-center"><span>Profil</span></a>
                                <a href="{{ route('riwayat') }}" class="dropdown-item d-flex align-items-center"> <span>Riwayat Aktivitas</span></a>
                                <a href="{{ route('password') }}" class="dropdown-item d-flex align-items-center"> <span>Ubah Kata Sandi</span></a>
                                <a href="{{ route('user.logout') }}" class="dropdown-item d-flex align-items-center"> <span>Logout</span></a>
                        </div>
                    </div>
                    @else
                        <div class="col-3" style="padding:0px;">
                            <a href="{{ route('user.loginpage') }}" style="position: relative;z-index: 999;"><span style="color:#fff;font-family:poppins;border:1px solid#fff;padding:7px 15px;">Daftar</span></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->

@yield('isi')

<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row ">
            <div class="col-lg-4 col-12">
                <div class="single-footer-widget mb-30">
                    <div class="logo">
                        <a href="" class="d-inline-block"><img src="{{ asset('img/jahitin3.png')}}" width="125px" alt="image"></a>
                    </div>
                    <br>
                    <ul class="social-link">
                        <li><a href="https://www.facebook.com/jahitindotcom/" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="https://www.twitter.com/jahitin_com" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href="https://www.instagram.com/jahitin_com" class="d-block" target="_blank"><i
                                        class='bx bxl-instagram'></i></a></li>
                        <li><a href="mailto:jahitinonline@gmail.com?Subject=Hello%20again" class="d-block" target="_blank"><i class='bx bx-envelope'></i></a></li>
                    </ul>
                    <ul class="support-link">
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-12 ">
                <div class="single-footer-widget mb-30">
                    <h3>Lainnya</h3>

                    <ul class="useful-link">
                        <li><a href="{{ route('mitra')}}">Mitra</a></li>
                        <li><a href="{{ route('gallery')}}">Galeri Kami</a></li>
                        <li><a href="{{ route('kontak')}}">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="single-footer-widget mb-30">
                    <h3>Newsletter</h3>
                    @if (session('info'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('info') }}
                        </div>
                    @endif
                    <div class="newsletter-box">
                        <p>Untuk mendapatkan informasi terbaru, silahkan isi newsletter kami</p>
                        <form action="{{ route('subscribe') }}" method="post">
                        @csrf
                            <input type="email" class="input-newsletter form-control" placeholder="Masukkan email kamu" name="email" required>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row ">
                <div class="col-md-8 col-12">
                    <p class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Jahitin Academy - PT Revolusi Fesyen Indonesia</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

<!-- Jquery JS -->
<script src="{{ asset('js/jquery.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{ asset('js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
<!-- Mixitup JS -->
<script src="{{ asset('js/mixitup.min.js')}}"></script>
<!-- Parallax JS -->
<script src="{{ asset('js/parallax.min.js')}}"></script>
<!-- Appear JS -->
<script src="{{ asset('js/jquery.appear.min.js')}}"></script>
<!-- Odometer JS -->
<script src="{{ asset('js/odometer.min.js')}}"></script>
<!-- Particles JS -->
<script src="{{ asset('js/particles.min.js')}}"></script>
<!-- MeanMenu JS -->
<script src="{{ asset('js/meanmenu.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('js/jquery.nice-select.min.js')}}"></script>
<!-- Viewer JS -->
<script src="{{ asset('js/viewer.min.js')}}"></script>
<!-- Slick JS -->
<script src="{{ asset('js/slick.min.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
<!-- AjaxChimp JS -->
<script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('js/form-validator.min.js')}}"></script>
<!-- Contact Form JS -->
<script src="{{ asset('js/contact-form-script.js')}}"></script>
<!-- Raque Map JS -->
<script src="{{ asset('js/raque-map.js')}}"></script>
<!-- Main JS -->
<script src="{{ asset('js/main.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@stack('script')
</body>
</html>
