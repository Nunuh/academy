<!-- Bootstrap CSS -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Required meta tags -->

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="icon" type="image/png" href="{{ asset('img/jahitin-logo.jpg')}}">
<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader -->
<section class="login-area">
    <div class="row m-0">

        <div class="col-lg-6 col-md-12 p-0">
            <img src="{{ asset('img/academy/img15.jpg')}}" style="height: 100%;width: 100%;object-fit: cover;">
        </div>
        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">
                            <div class="logo">
                                <a href="{{ route('home')}}"><img src="{{ asset('img/logo2.png')}}" alt="image" style="height:58px;"></a>
                            </div>

                            <h5>Ubah kata sandi</h5>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <form action="{{ route('sendMailReset') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" placeholder="Masukkan alamat email anda"
                                           class="form-control" id="email" name="email" required>
                                </div>
                                <br>
                                <button type="submit">Kirim Permintaan</button>
                                <div class="forgot-password">
                                    <a href="{{ route('user.loginpage') }}">Ingin mencoba login?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

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