@extends('layout')
<title> Mitra | Jahitin Academy </title>
@section('isi')
<style>
    .form-control {
    height: 40px;
    padding: 0 0 0 12px;
    line-height: initial;
    color: #252525;
    background-color: #ffffff;
    border: 1px solid #e6e9fc;
    border-radius: 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    font-size: 15px;
    font-weight: 400;
}
.myAccount-content h3 {
    margin-top: 50px;
    margin-bottom: 50px;
    font-size: 22px;
    font-weight: 600;
}
.myAccount-content .edit-account .form-group label {
    display: inline-block;
    margin-bottom: 10px;
    font-size: 14px;font-family: "Nunito", sans-serif;
    font-weight: 500;
}
.default-btn {
    -webkit-transition: 0.5s;
    transition: 0.5s;
    display: inline-block;
    padding: 13px 25px 12px 55px;
    position: relative;
    background-color: #7e1037;
    color: #ffffff;
    border-width: 2px;
    border-style: solid;
    border-color: #7e1037;
    border-radius: 1px;
    font-size: 14.5px;
    font-weight: 600;
    font-family: "Poppins", sans-serif;
}
</style>
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Mitra</li>
                </ul>
                <h2>Mitra Kami</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{ asset('img/1.jpg')}}" class="shadow2" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <span class="sub-title" style="letter-spacing:2px;">Kemitraan Lembaga</span>
                        <h2>Jadi Mitra Penyedia Kelas Tatap Muka dan Kelas Online</h2>
                        <p>Temui ribuan penjahit potensial yang ingin meningkatkan skill dan kompetensi di bidang menjahit, dengan menjadikan lembaga Anda mitra penyedia kelas tatap muka dan kelas online.</p>
                        <p>Mitra bisa memilih untuk menyediakan kelas satuan maupun paket kombo/ bundling (yang isinya berbagai kelas dengan topik yang relevan).</p>
                    </div>
                </div>
            </div>
            <div class="funfacts-inner mt-5">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="single-funfact">
                            <div class="icon">
                                <i class='bx bx-group'></i>
                            </div>
                            <h3 class="odometer">{{ $mitra }}</h3>
                            <p>Mitra kami</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="single-funfact">
                            <div class="icon">
                                <i class='bx bx-play-circle'></i>
                            </div>
                            <h3 class="odometer">{{ $kelas }}</h3>
                            <p>Jumlah Kelas</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="single-funfact">
                            <div class="icon">
                                <i class='bx bx-user-check'></i>
                            </div>
                            <h3 class="odometer">{{ $user }}</h3>
                            <p>Penjahit Kami</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="single-funfact">
                            <div class="icon">
                                <i class='bx bx-book-reader'></i>
                            </div>
                            <h3 class="odometer"> {{ $wk }}</h3>
                            <p>Jumlah Workshop</p>
                        </div>
                    </div>
                </div>

                <div id="particles-js-circle-bubble"></div>
            </div>
            @if(session()->has('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session()->get('status')}}
                </div>
            @endif
            <div class="myAccount-content">
                <center><h3 style="font-size:20pt;font-weight: 500;">Formulir Pendaftaran Mitra </h3></center>
                <form class="edit-account" action="{{ route('tambahMitra') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    
                    <div class="container" style="padding: 10px 50px;">
                    <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nama Instansi<span class="required">*</span></label>
                                    <input name="namaInstansi" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nomor Hp<span class="required">*</span></label><br>
                                    <input name="telp" type="number" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Alamat<span class="required">*</span></label>
                                    <input name="alamat" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Kota<span class="required">*</span></label>
                                    <input name="kota" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nama PIC<span class="required">*</span></label>
                                    <input name="namaPic" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email<span class="required">*</span></label>
                                    <input name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <br>
                                <center>
                                    <button type="submit" class="default-btn" style="padding: 10px 30px 10px 30px;">Ajukan sebagai Mitra
                                    </button></center>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </section>
@endsection
