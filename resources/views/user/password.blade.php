@extends('layout')
@section('judul')
Password| Jahitin Academy
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('isi')
<div class="page-title-area page-title-style-two item-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <ul>
                <li><a href="{{ route('home')}}">Beranda</a></li>
                <li>Ubah Kata Sandi</li>
            </ul>
            <h2>Ubah Kata Sandi</h2>
        </div>
    </div>
</div>

<section class="about-area ptb-70">
    <div class="container">
        <form class="edit-account" action="{{ route('ubahPass.user') }}" method="post">
            @csrf
            @if (session('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('message') }}
                </div>
            @endif
             @if (session('danger'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('danger') }}
                </div>
            @endif
            <div class="row">
               
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label>Kata Sandi Saat Ini</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <input id="password" type="password" class="form-control" name="pass_lama" minlength="6" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-eye-slash" id="eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label>Kata Sandi Baru</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <input id="password1" type="password" class="form-control" name="pass_baru" minlength="6" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-eye-slash" id="eye1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label>Konfirmasi Kata Sandi Baru</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <input id="password2" type="password" class="form-control" name="konfirm_pass_baru" minlength="6" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-eye-slash" id="eye2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn"  style="padding: 10px 30px 10px 30px;">Simpan</button>
                </div>
            </div>
        </form>
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
@endsection