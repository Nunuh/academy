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

<section class="login-area">
    <div class="row m-0">
        <div class="col-lg-12 col-md-12">
            <div class="login-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">
                            <div class="logo">
                                <a href="{{ route('home')}}"><img src="{{ asset('img/logo2.png')}}" alt="image" style="height:58px;"></a>
                            </div>

                            <h5>Hai {{ $users->fullname }}, <br> Silahkan ubah kata sandi Anda</h5>
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
                            <form action="{{ route('reset',['id' => $users->id] ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                 <div class="form-group">
                                    <label>Kata Sandi Baru</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input id="password1" type="password" class="form-control" name="password" minlength="6" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-eye-slash" id="eye1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Kata Sandi Baru</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input id="password2" type="password" class="form-control" name="konfirm_pass" minlength="6" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-eye-slash" id="eye2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <script>
      $(function(){
        $('#eye').click(function(){
            
                if($(this).hasClass('fa-eye-slash')){
                
                $(this).removeClass('fa-eye-slash');
                
                $(this).addClass('fa-eye');
                
                $('#password').attr('type','text');
                    
                }else{
                
                $(this).removeClass('fa-eye');
                
                $(this).addClass('fa-eye-slash');  
                
                $('#password').attr('type','password');
                }
            });
        });

        $(function(){
        $('#eye1').click(function(){
            
                if($(this).hasClass('fa-eye-slash')){
                
                $(this).removeClass('fa-eye-slash');
                
                $(this).addClass('fa-eye');
                
                $('#password1').attr('type','text');
                    
                }else{
                
                $(this).removeClass('fa-eye');
                
                $(this).addClass('fa-eye-slash');  
                
                $('#password1').attr('type','password');
                }
            });
        });
        $(function(){
        $('#eye2').click(function(){
            
                if($(this).hasClass('fa-eye-slash')){
                
                $(this).removeClass('fa-eye-slash');
                
                $(this).addClass('fa-eye');
                
                $('#password2').attr('type','text');
                    
                }else{
                
                $(this).removeClass('fa-eye');
                
                $(this).addClass('fa-eye-slash');  
                
                $('#password2').attr('type','password');
                }
            });
        });
    </script>