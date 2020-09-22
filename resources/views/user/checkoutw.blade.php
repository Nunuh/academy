@extends('layout')
<title> Pembayaran | Jahitin Academy </title>
@section('isi')<!-- Start Page Title Area -->
<!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="page-title-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Checkout</li>
            </ul>
            <h2>Pembayaran Workshop</h2>
        </div>
    </div>
</div>

<style>

    .info-bank {
        display: none;
    }

    .btn-confirmation {
        background: #1abc9c;
        border: #1abc9c;
    }

    .btn-confirmation:hover {
        background: #16a487;
        border: #16a487;
    }
</style>
@if(session()->has('message'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('message') }}
    </div>
@endif
<div class="container" style="padding:50px 15px;">
    <div class="row justify-content-center">
        <div class="col col-12 col-lg-7">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <img class="thumbnail-kelas" src="{{ asset('images/workshop/'. $workshop->image)}}" alt="image" style="object-fit:cover; object-position:left;">
                    </div>
                    <h6 class="line-height-1 mb-0 mt-3">{{ $workshop->judul }}</h6>
                    <p class="text-gray-500 mb-0">Diselenggarakan oleh Jahitin Tim</p>
                    <hr>

                    <h6 class="h6 mb-0 line-height-1 mb-3" style="font-size: 14px;">Kelas akan diberikan kepada {{ $user->name }}</h6>
                    <div class="form-group form-group__icon">
                        <input id="email" type="email" name="email" required="" autocomplete="email" autofocus="" class="form-control" aria-describedby="emailHelp" placeholder="Alamat Email" value="{{ $user->email }}" readonly="" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-materi-preview col col-12 col-lg-4">
            <div class="card">
            @if (isset($www))
                <div class="card-body">
                    <p>Anda sudah pernah bertransaksi workshop ini</p>
                      <a href="{{route('riwayat')}}" style="font-size: 16px !important;" class="btn btn-info btn-block font-weight-medium">Menuju Riwayat</a>
                </div>            
            @else
                 <div class="card-body">
                    <h6 class="h6 mb-0 line-height-1 mb-3">Pembayaran</h6>
					
                    <div class="d-flex justify-content-between mb-3">
                        <p class="line-height-1 h7 text-gray-500 mb-0">Harga Kelas</p>
                        <h6 class="line-height-1 mb-0 ">Rp. {{ number_format($workshop->sale) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <p class="line-height-1 h7 text-gray-500 mb-0">Kode Unik : </p>
                        @if($workshop->sale == 0)
                            <h6 class="line-height-1 mb-0 ">Gratis</h6>
                        @else
                            <h6 class="line-height-1 mb-0 ">Rp. {{ number_format($kode) }}</h6>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <p class="line-height-1 h7 text-gray-500 mb-0">Total Harga : </p>
                        @if($workshop->sale == 0)
                            <h6 class="line-height-1 mb-0 ">Gratis</h6>
                        @else
                            <h6 class="line-height-1 mb-0 ">
                                <b>Rp. {{ number_format($kode+$workshop->sale) }}</b></h6>
                        @endif
                    </div>
                    @if($workshop->sale != 0)
						
                        <div class="info-bank">
                            <hr>
                            <h6 class="h6 mb-0 line-height-1 mb-3">Transfer Pembayaran:</h6>
							<div class="item-bank-kelas">
                                <div class="d-flex justify-content-between mb-3">
                                    <img
                                        src="{{ asset('img/bca.png')}}"
                                        style="height:30px;">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Bank</p>
                                    <h6 class="line-height-1 mb-0">BCA</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">No. Rekening</p>
                                    <h6 class="line-height-1 mb-0">1024 020 200</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Penerima</p>
                                    <p class="line-height-1 mb-0" style="font-size:10pt;color: #000;font-weight: 600;">PT. Revolusi Fesyen Indonesia</p>
                                </div>
                            </div>
                            <div class="item-bank-kelas">
                                <div class="d-flex justify-content-between mb-3">
                                    <img
                                        src="{{ asset('img/bni.png')}}"
                                        style="height:30px;">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Bank</p>
                                    <h6 class="line-height-1 mb-0">BNI</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">No. Rekening</p>
                                    <h6 class="line-height-1 mb-0">441 1441 565</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Penerima</p>
                                    <p class="line-height-1 mb-0" style="font-size:10pt;color: #000;font-weight: 600;">PT Revolusi Fesyen Indonesia</p>
                                </div>
                                <hr>
                            </div>
                            <div class="item-bank-kelas">
                                <div class="d-flex justify-content-between mb-3">
                                    <img
                                        src="{{ asset('img/mandiri.png')}}"
                                        style="height:30px;">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Bank</p>
                                    <h6 class="line-height-1 mb-0">Mandiri</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">No. Rekening</p>
                                    <h6 class="line-height-1 mb-0">14100 1898 9194</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Penerima</p>
                                    <p class="line-height-1 mb-0" style="font-size:10pt;color: #000;font-weight: 600;">PT Revolusi Fesyen Indonesia</p>
                                </div>
                                <hr>
                            </div>
                            <h6 class="h6 mb-0 line-height-1 mb-3">Konfirmasi Pembayaran:</h6>
                            <div class="item-bank-kelas">
                                <div class="d-flex justify-content-between mb-3">
                                    <img src="https://buildwithangga.com/images/logo_whatsapp.png"
                                         style="height:40px;">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="line-height-1 h7 text-gray-500 mb-0">Admin Jahitin</p>
                                    <h6 class="line-height-1 mb-0">0856 4716 0047</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('bayar.workshop', ['kode'=>$kode]) }}" method="POST">
                            <a href="#" style="font-size: 16px !important;"
                            class="btn btn-info btn-block font-weight-medium btn-lanjutkan-bayar">LANJUTKAN
                                PEMBAYARAN</a>
                            @csrf
                            <input type="hidden" name="workshop" value="{{ $workshop->id }}">
                                <button style="padding: 10px 0px;color:#fff;" type="submit" class="mt-0 btn btn-primary btn-block font-weight-medium btn-confirmation">
                                KONFIRMASI PEMBAYARAN
                            </button>
                        </form>
                    </div>
                    @else
                        <form action="{{ route('bayar.workshop', ['kode'=>$kode]) }}" method="POST">
                            <a href="#" style="font-size: 16px !important;"
                            class="btn btn-info btn-block font-weight-medium btn-lanjutkan-bayar">LANJUTKAN
                                PEMBAYARAN</a>
                            @csrf
                            <input type="hidden" name="workshop" value="{{ $workshop->id }}">
                            <button style="padding: 10px 0px;color:#fff;" type="submit"
                                    class="mt-0 btn btn-primary btn-block font-weight-medium btn-confirmation">
                                KONFIRMASI PEMBAYARAN
                            </button>
                        </form>
                    @endif
            @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.btn-confirmation').css('display', 'none');

    $('.btn-lanjutkan-bayar').click(function (e) {
        $('.info-bank').fadeIn();
        $('.btn-lanjutkan-bayar').css('display', 'none');
        $('.btn-confirmation').fadeIn();
        e.preventDefault();
    });
</script>
@endsection
