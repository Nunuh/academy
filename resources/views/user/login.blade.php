<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{ asset('css/bootstrap..min.css')}}">
<link rel="stylesheet" href="{{ asset('css/jahitin.css')}}">
<link rel="stylesheet" href="{{ asset('css/style.css')}}">
<link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="{{ asset('img/jahitin-logo.jpg')}}">
@section('judul')
    Login | Jahitin Academy
@endsection

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <img src="{{ asset('img/jahitinLoader.gif')}}">
    </div>
</div>
<!-- End Preloader -->
        <!-- Start Login Area -->
        <section class="login-area">
            <div class="row m-0">  
                <div class="col-lg-6 col-md-12 p-0 logini-page">
                    <img src="{{ asset('img/academy/img15.jpg')}}" style="height: 100%;width: 100%;object-fit: cover;">
                </div>
            <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo">
                                        <a href="{{ route('home')}}"><img src="{{ asset('img/logo2.png')}}" alt="image" style="height:58px;" ></a>
                                    </div>

                                    <h4 style="font-weight:500;">Hai, Selamat Datang!</h4>
                                    <p>Belum punya akun Jahitin Academy? <a style="font-weight:bold;color:#7E1037" href="{{ route('user.regpage')}}">Daftar Sekarang</a></p>
                                    <hr>
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
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('user.login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" placeholder="Masukkan Email atau No. Telp" value="{{ old('username') ?: old('email') }}" required="Email/Telp jangan lupa diisi!!">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input id="password" type="password" placeholder="********" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-eye-slash" id="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <br>
                                <button type="submit">Masuk</button>
                                <div class="forgot-password">
                                    <a href="{{ route('forgot') }}">Lupa kata sandi?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

        $('#eye').click(function () {

            if ($(this).hasClass('fa-eye-slash')) {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#password').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#password').attr('type', 'password');
            }
        });
    });
</script>
