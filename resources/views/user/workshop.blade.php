@extends('layout')
@section('judul')
    Workshop | Jahitin Academy
@endsection
@section('isi')
<style>
    p{
        font-size:10pt;
    }
    @media (max-width: 480px) {
    p{
        font-size:9pt;
    }
}
.workshop-web {
    display: block;
}
.workshop-mobile {
    display: none;
}
@media (max-width: 480px) {
    .workshop-web {
        display: none;
    }
    .workshop-mobile {
        display: block;
    }
}
</style>
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Workshop</li>
                </ul>
                <h2>Daftar Workshop</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Courses Area -->
    <section class="events-area pt-100 pb-70">
        <div class="container">
            <div class="workshop-web">   
                <div class="row">
                    @foreach( $work as $workshop)
                        <div class="col-md-6 col-6">
                            <div class="single-events-box mb-30">
                                <div class="events-box">
                                    <div class="events-image">
                                        <div class="image">
                                            <img src="{{ asset('images/workshop/'.$workshop->image) }}" alt="image" class="fit-imge" style="object-position:left;width:100%;">
                                            <div class="events-tag">
                                                @if($workshop->sale == 0)
                                                    <a class="d-block">GRATIS</a>
                                                @else
                                                    <a class="d-block">BERBAYAR</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="events-content">
                                        <div class="content" style="height:100%; padding:15px;">
                                            <!-- <div style="position:absolute;right:15px;">
                                                <?php Carbon\Carbon::setLocale('id');?>
                                                {{Carbon\Carbon::parse($workshop->waktu)->translatedFormat('l, d F Y')}}
                                            </div> -->
                                            <div style="color: #339535;font-size: 16px;width: 100%;font-weight: 600;">Online</div>
                                            <h3><a href="{{ route('workshop.detail', ['slug' => $workshop->slug_judul]) }}">{{ $workshop->judul }}</a>
                                            </h3>
                                            <div class="event-author">
                                                <a href="{{ route('user.institution', ['slug' => $workshop->institution->nama]) }}"><img src="{{ asset('images/insti/'.$workshop->institution->gambar) }}" class="rounded-circle mr-2" alt="image" style="box-shadow: 0px 5px 16px 0px rgba(100, 100, 100, 0.2); padding: 5px; height:30px;"><span>{{ $workshop->institution->namaInstansi }}</span></a>
                                            </div>
                                            <div style="display:flex;min-height:75px;">
                                                <div class="courses-diskon" style="position:relative;left:0;width: 50%;">
                                                    <s class="strikeout" style="font-size:12px;">Rp {{ number_format($workshop -> harga) }}</s><br>
                                                </div>
                                                <div class="courses-harga" style="position:relative;right:0;width: 50%;text-align: right;">
                                                    Rp {{ number_format($workshop -> sale) }}
                                                </div>
                                            </div>
                                             <a href="{{ route('workshop.detail', ['slug' => $workshop->slug_judul]) }}"><div style="background:#9b1442;color:#fff;font-size:10pt; position:absolute; bottom:15px; width:90%;text-align:center; padding:5px; border-radius:5px;margin-top:15px">Detail</div></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                
                @foreach( $work as $workshop )
                
                <div class="workshop-mobile">
                     <div class="col-md-12 col-12">
                        <div class="single-events-box mb-30">
                            <div class="events-box">
                                <div class="events-image">
                                    <div class="image">
                                        <img src="{{ asset('images/workshop/'.$workshop->image) }}" alt="image" class="fit-imge" style="width:100%;">
                                        <div class="events-tag">
                                            @if($workshop->sale == 0)
                                                <a class="d-block">GRATIS</a>
                                            @else
                                                <a class="d-block">BERBAYAR</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>      
                                <div class="events-content" >
                                    <div class="content">
                                    <div class="courses-diskon">
                                        <span class="persentase"> {{ ($workshop->harga - $workshop->sale) / $workshop->harga * 100  }}%</span>
                                        <s class="strikeout" style="font-size:12px;">Rp {{ number_format($workshop -> harga) }}</s>
                                    </div>
                                    <div class="courses-harga" style="position: absolute;right: 15px;">Rp {{ number_format($workshop -> sale) }}</div><br><br>
                                        <div style="width:100%;display:flex;">
                                            <h3><a href="{{ route('workshop.detail', ['slug' => $workshop->slug_judul]) }}">{{ $workshop->judul }}</a></h3>

                                        </div>
                                        <div class="event-author" style="margin-bottom:10px;">
                                            <a href="{{ route('user.institution', ['slug' => $workshop->institution->nama]) }}"><img src="{{ asset('images/insti/'.$workshop->institution->gambar) }}" class="rounded-circle mr-2" alt="image" style="box-shadow: 0px 5px 16px 0px rgba(100, 100, 100, 0.2); padding: 5px; height:30px;"><span>{{ $workshop->institution->namaInstansi }}</span></a>
                                            
                                            <span class="tersedia-workshop" style="position: absolute;right: 15px;">Tersedia </span>
                                        </div>
                                        <center>
                                            <span class="kota-event">
                                            <i class='bx bxs-map'></i> {{$workshop->kota}}</span>&nbsp;&nbsp;
                                                <i class='bx bx-badge' ></i> {{$workshop->level}} &nbsp;&nbsp;<i class='bx bx-certification'></i> Sertifikat  
                                        </center>  
                                    </div>
                                </div>
                                <div class="events-date">
                                    <div class="date">
                                        @if(Auth::guard('user')->check())
                                            @if(Auth::guard('user')->user()->workshop->contains($workshop->id))
                                                <a href="{{ route('workshop.detail', ['slug' => $workshop->slug_judul]) }}" class="workshop-button">Detail</a>
                                            @else
                                                <a href="{{ route('workshop.detail', ['slug' => $workshop->slug_judul]) }}" class="workshop-button">Detail</a>
                                            @endif
                                            @else
                                                <a href="{{ route('workshop.detail', ['slug' => $workshop->slug_judul]) }}" class="workshop-button">Detail</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            <center>{{ $work->links() }}</center>
            </div>
    </section>
@endsection
