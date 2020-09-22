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

<Style>
.register-content .register-form form .form-control {
    background-color: #ffffff;
    color: #252525;
    border: none;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    -webkit-box-shadow: 0px 5px 28.5px 1.5px rgba(149, 152, 200, 0.2) !important;
    box-shadow: 0px 5px 28.5px 1.5px rgba(149, 152, 200, 0.2) !important;
    height: 55px;
    font-size: 15px;
}

.register-content .register-form form button {
    -webkit-transition: 0.5s;
    transition: 0.5s;
    display: block;
    width: 100%;
    padding: 13px 25px 12px 25px;
    position: relative;
    background-color: #7e1037;
    color: #ffffff;
    -webkit-box-shadow: 0px 5px 28.5px 1.5px rgba(255, 97, 47, 0.2);
    box-shadow: 0px 5px 28.5px 1.5px rgba(255, 97, 47, 0.2);
    border-width: 2px;
    border-style: solid;
    border-color: #7e1037;
    border-radius: 5px;
    font-size: 14.5px;
    font-weight: 700;
    margin-top:30px;
}

.register-content .register-form form button:hover,
.register-content .register-form form button:focus {
    background-color: #b9114c;
    color: #ffffff;
    border-color: #b9114c;
}
dl, ol, ul {
    margin: 0;
padding: 0;
}
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@section('judul')
    Login | Jahitin Academy
@endsection

<div class="preloader">
    <div class="loader">
        <img src="{{ asset('img/jahitinLoader.gif')}}">
    </div>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('message') }}
    </div>
@endif
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
<!-- Start Register Area -->
<section class="register-area">
    <div class="row m-0">
        <div class="col-lg-6 col-md-12 p-0 logini-page">
            <img src="{{ asset('img/academy/img15.jpg')}}" style="height: 100%;width: 100%;object-fit: cover;">
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="register-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="register-form">
                            <div class="logo">
                                <a href="{{ route('home')}}"><img src="{{ asset('img/logo2.png')}}" alt="image"
                                                                  style="height:58px;"></a>
                            </div>
                            <h3>Daftar Akun </h3>
                            <p>Sudah punya akun? <a style="font-weight:bold;color:#7E1037"
                                                    href="{{ route('user.loginpage')}}">Login</a></p>
                            <hr>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('user.reg') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <h6 style="margin:25px;">Masukan nomer HP Anda</h6>
                                    <input type="number" name="telp" id="telp" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeypress="return this.value.length < 13;" oninput="if(this.value.length>=13) { this.value = this.value.slice(0,13); }" placeholder="08978712345" class="form-control">
                                </div>
                                <button type="submit">Daftar</button>
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

    $(function () {

        $('#eye1').click(function () {

            if ($(this).hasClass('fa-eye-slash')) {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#password1').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#password1').attr('type', 'password');
            }
        });
    });

    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
</script>
