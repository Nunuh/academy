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
                <h2>Riwayat Aktivitas</h2>
            </div>
        </div>
    </div>
<style>
.date-boxe{
    padding: 8px 12px;background: #DA4453;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #89216B, #DA4453);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #89216B, #DA4453); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border-radius: 8px;
    color: #fff;
    position: relative;
    z-index: 1;
    box-shadow: 0 10px 16px -8px rgba(245,81,184,.5);
    margin-right: 16px;
    transition: all .2s;
    text-align: center;
    }
.content-boxe{
   width:100%;
}
.items-data{
    align-items: center;
    border-bottom: thin solid #f5f5f5;
    cursor: pointer;
    box-shadow: 0 8px 8px -8px rgba(0,0,0,.05);
    border-radius: 15px;
    background: #fcfcfc;
    margin-bottom: 10px;
}
.content-wrap{
    display: flex;
    width: 100%;
    align-items: center;
    padding: 16px 32px;
}

</style>
    <section class="ptb-70">
        <div class="container">
            <div class="myAccount-content">
                <h3>Pembelian Saya</h3>
                <div class="container">
                    @if(count($transw) > 0)
                        @foreach($transw as $transaksi)
                        <div class="items-data">
                            <div class="row">
                                <div class="col-md-10 col-9 content-wrap" >
                                    <div class="date-boxe">
                                        <span style="font-weight:bold;font-size:24px;">{{Carbon\Carbon::parse($transaksi->workshop->waktu)->translatedFormat('d')}}</span><br>
                                        <span> {{Carbon\Carbon::parse($transaksi->workshop->waktu)->translatedFormat('M')}}</span>
                                    </div>
                                    <div class="content-boxe">
                                        <p style="margin:0;"><a href="{{ route('workshop.detail', ['slug'=>$transaksi->workshop->slug_judul]) }}"><strong>{{ $transaksi->workshop->judul }}</strong></a></p>
                                        <span style="color:#727695;">Online</span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-3" style="padding: 16px 0px;display: flex;width: 100%;align-items: center;">
                                    <div class="content-boxe">
                                        <a href="{{ route('riwayat.detail', ['seri'=>$transaksi->seri]) }}"> <button class="btn btn-info" style="padding:0.2rem 0.75rem;font-size:14px;"> Detail</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                    @else
                        <center><img src="{{ asset('img/empty-folder.png') }}" style="height:150px;"><br><br>Belum ada Pembelian</center>
                    @endif
            </div>

            <div class="myAccount-content">
                <h3>Sertifikat Saya</h3>
                <div class="container">
                    @if(count($transw) > 0)
                    <div class="row">
                        @foreach($transw as $transaksi)
                        @if($transaksi->dokumentasi )
                            <div class="col-md-4 col-12" > 
                                <div class="items-data" style="margin-bottom:20px;padding:15px;">
                                    <a href="#" data-toggle="modal" data-target="#lihatsertif_{{ $transaksi->id }}">
                                    <img src="{{ asset('images/sertifikat/'.$transaksi->workshop->sertif) }}" style="height:200px;width:100%;object-fit:cover;"><hr>
                                    <h6>{{ $transaksi->workshop->judul }}</h6> </a>
                                    <p>Tanggal diperoleh :
                                {{Carbon\Carbon::parse($transaksi->Updated_at)->translatedFormat('d F Y')}}</p>
                                </div>
                            </div>
                            <div class="modal fade" id="lihatsertif_{{ $transaksi->id }}" tabindex="-1"  role="dialog" aria-labelledby="Sertifikat" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('images/sertifikat/'.$transaksi->workshop->sertif) }}" alt="image">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ asset('images/sertifikat/'.$transaksi->workshop->sertif) }}" download> <button class="btn btn-success"><i class='bx bx-download'></i> Download Sertifikat</button></a>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                 <div style="width:100%;"><center><img src="{{ asset('img/empty-folder2.png') }}" style="height:150px;"><br><br>Belum ada Sertifikat</center></div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                    <center><img src="{{ asset('img/empty-folder2.png') }}" style="height:150px;"><br><br>Belum ada Sertifikat</center>
                @endif
            </div>
        </div>
    </section>

@endsection
