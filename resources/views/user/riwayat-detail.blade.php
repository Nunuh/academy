@extends('layout')
@section('judul')
    Riwayat Aktivitas | Jahitin Academy
@endsection
@section('isi')
    <div class="page-title-area page-title-style-two item-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home')}}">Beranda</a></li>
                    <li>Riwayat</li>
                </ul>
                <h2>Detail Riwayat</h2>
            </div>
        </div>
    </div>
<style>
*{
    font-family: "Nunito", sans-serif;
}
.detail-up{
padding: 25px;
background: #fbfbfb;
border-radius: 20px;
margin-bottom:25px;
}
.contain-title{
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    opacity: .75;
}
h1{
    font-size:2.5rem;
}
h2 {
    font-size:1.5rem;
}
.center-go {
    margin:100px auto;
}
@media (max-width: 480px) {
    .center-go {
        margin:10px auto;
    }
    h1{
    font-size:1.7rem;
    }
    h2 {
        font-size:1.3rem;
    }
    h5{
        margin-top:20px;
        font-size:1rem;
    }
    .ptb-70 {
    padding-top: 30px;
    padding-bottom: 30px;
}
}
</style>
<section class="ptb-70">
    <div class="container">
        <div class="detail-up">
            <div class="row">
                <div class="col-md-6 col-12">
                    <img class="thumbnail-kelas" src="{{ asset('images/workshop/'. $transaksi->workshop->image)}}"alt="image" style="object-fit:cover; object-position:left;">
                </div>
                <div class="col-md-6 col-12 center-go">
                    <!-- <h5>Workshop Penjahit</h5>
                    <h1>{{ $transaksi->workshop->judul}}</h1> -->
                    <span>Tanggal Pelaksanaan</span>
                    <p><?php Carbon\Carbon::setLocale('id');?>
                        {{Carbon\Carbon::parse($transaksi->workshop->waktu)->translatedFormat('l, d F Y')}}</p>
                    <span>Lokasi Pelaksanaan</span>
                    <p>Online</p>
                </div>
            </div>
        </div>
        <div class="detail-up">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2>Pembayaran</h2>
                    <hr>
                    <span class="contain-title">Nomer Invoice</span>
                    <p>{{$transaksi -> seri}}</p>
                    <span class="contain-title">Status</span>
                    <p>@if($transaksi->keterangan)
                            <span>Lunas</span>
                        @else
                            <span>Belum Lunas</span>
                        @endif</p>
                    <span class="contain-title">Total Bayar</span>
                    <p>Rp. {{number_format($transaksi->total)}}</p>
                    <span class="contain-title">Metode Pembayaran</span>
                    <p>Transfer</p>
                    <br>
                </div>
                
                <div class="col-md-6 col-12">
                    @if($transaksi->keterangan)
                        <div class="info-bank">
                            <h2>Workshop</h2><hr>
                           <span>{{ $transaksi->workshop->judul}}</span><br><span style="color:#727695;">
                           <?php Carbon\Carbon::setLocale('id');?>
                            {{Carbon\Carbon::parse($transaksi->workshop->waktu)->translatedFormat('l, d F Y')}}<br> {{ $transaksi->workshop->jam}} </span><br><br>
                            <div class="row flex-column-reverse flex-lg-row">
                                <div class="col-md-12  col-lg-12 col-12">
                                <a href="{{ route('riwayat') }}"> <button class="btn btn-info" style="width:100%"> Kembali</button></a>
                                </div>
                            </div>
                        </div>
                       
                    @else
                          <div class="info-bank">
                            <h2>Transfer Pembayaran:</h2><hr>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-default" style="width:100%"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Bank BNI
                                        </button>
                                    </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                    <div class="item-bank-kelas">
                                            <div class="d-flex justify-content-between mb-3">
                                                <img src="{{ asset('img/bni.png')}}" style="height:30px;">
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
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-default collapsed" style="width:100%" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Bank BCA
                                        </button>
                                    </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="item-bank-kelas">
                                            <div class="d-flex justify-content-between mb-3">
                                                <img src="{{ asset('img/bca.png')}}" style="height:30px;">
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
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-default collapsed" style="width:100%" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Bank Mandiri
                                        </button>
                                    </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
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
                                                <p class="line-height-1 mb-0" style="font-size:10pt;color: #000;font-weight: 600;">PT. Revolusi Fesyen Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <?php $total = number_format($transaksi->workshop->sale + $transaksi->kode);
                                    $nama = Str::upper(Auth::guard('user')->user()->fullname);
                                    $isi = 'Halo, Saya '.$nama.' sudah melakukan pembayaran ' . $transaksi->workshop->judul . ' dengan Total Sebesar Rp. ' . $total . ' untuk akses Workshop Saya (' . Auth::guard('user')->user()->email . '). Berikut saya lampirkan foto bukti pembayaran : '; ?>
                                <div class="row flex-column-reverse flex-lg-row">
                                    <div class="col-md-4  col-lg-4 col-12">
                                    <a href="{{ route('riwayat') }}"> <button class="btn btn-info" style="width:100%;border:1px solid#000;"> Kembali</button></a>
                                    </div>
                                    @if($transaksi->keterangan)
                                    @else
                                    <div class="col-md-8 col-lg-8 col-12">
                                        <a href="https://api.whatsapp.com/send?phone=6285647160047&text={{ $isi }}"> <button class="btn btn-success" style="width:100%;"> Konfirmasi Pembayaran</button></a>
                                    </div>
                                    @endif
                                </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
