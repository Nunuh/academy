<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{ asset('css/bootstrap..min.css')}}">
<link rel="stylesheet" href="{{ asset('css/jahitin.css')}}">
<link rel="stylesheet" href="{{ asset('css/style.css')}}">
<link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<link rel="icon" type="image/png" href="{{ asset('img/jahitin-logo.jpg')}}">
<style>
    .register-content .register-form {
    text-align: center;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
}
 .fade:not(.show) {
    opacity: inherit;
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
/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0px 5px 28.5px 1.5px rgba(149, 152, 200, 0.2) !important;
    padding: 20px 30px;
    box-sizing: border-box;
    width: 100%;
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}
#msform input.otp-input {
  border: none;
  width: 9ch;
  background: 
    repeating-linear-gradient(90deg, 
        black 0, 
        black 1ch, 
        transparent 0, 
        transparent 1.5ch) 
      0 100%/100% 2px no-repeat;
  font: 5ch consolas, monospace;
  letter-spacing: .5ch;
}
#msform input.otp-input:focus  {
    border:none;
}

@media (max-width: 480px) {
     .register-content .register-form {
    text-align: center;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 0px;
}
    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0px 5px 28.5px 1.5px rgba(149, 152, 200, 0.2) !important;
        padding: 20px 10px;
        box-sizing: border-box;
        width: 100%;
        position: relative;
    }
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #7e1037;
    outline-width: 0;
    transition: All 0.5s ease-in;
    -webkit-transition: All 0.5s ease-in;
    -moz-transition: All 0.5s ease-in;
    -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
    width: 125px;
    background: #7e1037;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #7e1037;
}

#msform .action-button-previous {
    width: 100px;
    background: #C5C5F1;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
}

/*headings*/
.fs-title {
    font-size: 18px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 0.8rem;
    color: #666;
    margin-bottom: 10px;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
    padding:0;
}

#progressbar li {
    list-style-type: none;
    color: #000;
    text-transform: uppercase;
    font-size: 9px;
    width: 33.33%;
    float: left;
    position: relative;
    letter-spacing: 1px;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: #333;
    background: #f0f0f0;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #eee;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #7e1037;
    color: white;
}
</style>
@section('judul')
    Registrasi | Jahitin Academy
@endsection

<div class="preloader">
    <div class="loader">
        <img src="{{ asset('img/jahitinLoader.gif')}}">
    </div>
</div>

<section class="register-area">
    <div class="col-lg-12 col-md-12">
        <div class="register-content">
            <div class="d-table">
                <div class="register-form">
                    <div class="logo">
                        <a href="{{ route('home')}}"><img src="{{ asset('img/logo2.png')}}" alt="image" style="height:58px;"></a>
                    </div>
                    <div id="progressbar">
                        <ul class="nav" id="myTab">
                            <li class="{{old('tab') == 'otp' || old('tab') == 'isi' || old('tab') == 'selesai' ? 'active' : null }} active"><a role="tab" aria-controls="otp" title="Konfirmasi OTP"><i class='bx bx-user'></i>Verifikasi No. Hp</a> </li>
                            <li class="{{old('tab') == 'isi' || old('tab') == 'selesai' ? 'active' : null }} @if($user->konfirmasi == true && isset($user->password)) active @endif"><a role="tab" aria-controls="isi" title="Email dan Password"><i class='bx bx-photo-album'></i>Email dan Password</a> </li>
                            <li class="{{old('tab') == 'selesai' ? 'active' : null}} @if($user->konfirmasi == true && isset($user->password) && isset($user->email)) active @endif"><a role="tab" aria-controls="selesai" title="Registrasi Berhasil"><i class='bx bx-check-square'></i>Registrasi Berhasil</a></li>
                        </ul>
                    </div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('info') }}
                        </div>
                    @endif
                    
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('warning') }}
                        </div>
                    @endif
                    <div id="msform" class="tab-content">
                        <div id="otp" class="tab-pane fade{{old('tab') == 'otp' ? '-in active' : null}} @if($user->konfirmasi == false && $user->password == null && $user->email == null) -in active @endif" role="tabpanel">
                            <fieldset>
                                <h2 class="fs-title">Masukkan Kode Verifikasi</h2>
                                <h4 class="fs-subtitle">Kode OTP sudah dikirim ke No </h4>
                                <b>{{ $telp }}</b>
                                <form id="form_otp" action="{{ route('toVerify') }}" method="get">
                                    <input name="otp" class="otp-input" type="number"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'  onkeypress="return this.value.length < 6;" oninput="if(this.value.length>=6) { this.value = this.value.slice(0,6); }"  maxlength="6" required >
                                </form>
                                <br>
                                <button form="form_otp" type="submit" class="next action-button" style="letter-spacing:0.5;">Verifikasi</button>
                                 <br> <br>
                                  @if (session('warning'))
                                        <a href="{{ route('resendOtp', ['telp'=>$telp]) }}"><button onclick="resetTimer()" style="border:none;background:#fff; color:#7e1037;">Kirim ulang Kode OTP</button></a>
                                    @else
                                     <div id="countdown">[the div for countdown timer]</div>
                                        <div id="display" style="display:none"> Kode OTP belum masuk?<a href="{{ route('resendOtp', ['telp'=>$telp]) }}"><button onclick="resetTimer()" style="border:none;background:#fff; color:#7e1037;">Kirim ulang </button></a>
                                    </div>
                                @endif
                               
                            </fieldset>
                        </div>

                        <div id="isi" class="tab-pane fade{{old('tab') == 'isi' ? '-in active' : null}} @if($user->konfirmasi == true && $user->password == null && $user->email == null) -in active @endif" role="tabpanel">
                            <fieldset>
                                <h2 class="fs-title">Masukkan Email dan Password</h2>
                                <h4 class="fs-subtitle">Isikan Email dan password Anda</h4><br>
                                <form action="{{ route('setPass', ['telp'=>$telp]) }}" method="post">
                                    @csrf
                                     @if($errors->any())
                                        <div class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="Masukkan email Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Silahkan masukkan kata sandi">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="height:48px;">
                                                    <i class="fas fa-eye-slash" id="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="next action-button">Simpan</button>
                                </form>
                            </fieldset>
                        </div>

                        <div id="selesai" class="tab-pane fade{{old('tab') == 'selesai' ? '-in active' : null}} @if($user->konfirmasi == true && isset($user->password) && isset($user->email))-in active @endif"  role="tabpanel">
                            <fieldset>
                                <img src="">
                                <h2 class="fs-title">Selesai</h2>
                                <h3 class="fs-subtitle">Terimakasih sudah mendaftar! </h3>
                                 <a href="{{ route('home') }}"><input type="submit" name="submit" class="next action-button" style="width:175px;" value="Menuju Ke Beranda"/></a>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- Jquery JS -->
<script src="{{ asset('js/main.js')}}"></script>
<script>
    var timeout, interval
    var threshold = 60000;
    var secondsleft = threshold;

    window.onload = function() {
        startschedule();
    }

    function startChecking() {
        secondsleft -= 1000;
        document.querySelector("#countdown").innerHTML = "Mohon menunggu " + Math.abs((secondsleft / 1000)) + " detik untuk mengirim ulang";
        if (secondsleft == 0) {
            //document.getElementById("clickme").style.display="";
            clearInterval(interval);
            document.querySelector("#countdown").style.display = "none";
            document.querySelector("#display").style.display = "";
        }
    }

    function startschedule() {
        clearInterval(interval);
        secondsleft = threshold;
        document.querySelector("#countdown").innerHTML = "Mohon menunggu " + Math.abs((secondsleft / 1000)) + " detik untuk mengirim ulang";
        interval = setInterval(function() {
            startChecking();
        }, 1000)
    }

    function resetTimer() {
        document.querySelector("#countdown").style.display = "";
        document.querySelector("#display").style.display = "none";
        clearInterval(interval);
        secondsleft = threshold;
        document.querySelector("#countdown").innerHTML = "Mohon menunggu " + Math.abs((secondsleft / 1000)) + " detik untuk mengirim ulang";
        interval = setInterval(function() {
            startChecking();
        }, 1000)
    }

</script>

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
