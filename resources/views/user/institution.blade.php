@extends('layout')
<title> {{ $insti->nama}} | Institusi </title>
@section('isi')

    <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}' style="padding-top: 200px;padding-bottom: 50px; background: rgba(0, 0, 0, 0.9) url('{{ asset('images/backinsti/'. $insti->background) }}');">
        <div class="container">
            <div class="page-title-content text-center" style="color:#fff;">
                <img src="{{ asset('images/insti/'. $insti->gambar )}}" class="rounded-circle mr-2" style="width:100px;">
                <h2>{{ $insti->namaInstansi}}</h2>
                <p style="margin:15px 0px;"><a target="_blank" href="{{ $insti->url }}"><span style="background:#7e1037;color:#fff;font-size:10pt; margin:30px 0px; padding:5px; border-radius:5px;"><i class="bx bx-link" style="font-size:1em;"></i> {{ $insti->url }}</span></a></p>
                <p style="color:#fff; text-align: justify;text-shadow: 2px 2px 4px #000000;">{{$insti->deskripsi}}</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- End Page Title Area -->
    <section class="courses-area pt-70 pb-70" style="padding-bottom:70px;">
        <div class="container">
            <h2>Workshop</h2><br>
                
                @if($workshop->count() != 0 )
                    <div class="courses-slides owl-carousel owl-theme" >
                    @foreach($workshop as $wk)    
                        <div class="single-courses-box mb-30" style="border:1px solid#ddd;">
                            <div class="courses-image">
                                <a href="{{ route('workshop.detail', ['slug' => $wk->slug_judul ]) }}">
                                <img src="{{ asset('images/workshop/'.$wk->image) }}" alt="image" class="fit-imge">
                                    <div class="courses-tag">
                                        {{ ($wk->harga - $wk->sale) / $wk->harga * 100  }}%
                                    </div>
                                </a>
                            </div>
                            <div class="courses-diskon">
                                <s class="strikeout" style="font-size:12px;">Rp {{ number_format($wk -> harga) }}</s>
                            </div>
                            <div class="courses-harga">Rp {{ number_format($wk -> sale) }}</div>
                            <div class="courses-content"><br>
                                <div class="course-author d-flex align-items-center">
                                    <a href="{{ route('user.institution', ['slug' => $wk->institution->nama]) }}"><img src="{{ asset('images/insti/'.$wk->institution->gambar) }}" class="rounded-circle mr-2 institusi-home" style="display:inline-block;">
                                    <span>{{ $wk->institution->namaInstansi }}</span></a>
                                    <span style="font-size:12px; padding:5px;position: absolute;right: 20px; "><i class='bx bxs-map'></i> {{$wk->kota}}</span>
                                </div>
                                <h3><a href="{{ route('workshop.detail', ['slug' => $wk->slug_judul ]) }}" class="d-inline-block judul-home">{{ $wk->judul }}</a></h3>
                                <div style="width:100%">
                                    <i class='bx bx-badge'></i><span class="badge-home"> {{$wk->level}} &nbsp;&nbsp;&nbsp;&nbsp; @if($wk->certificate == 'YA') <i class='bx bx-certification'></i> Sertifikat @endif </span><span class="tersedia">Tersedia </span>
                                </div>
                            </div>

                            <div class="courses-box-footer" style="padding:0;" >
                                @if(Auth::guard('user')->check())
                                    @if(Auth::guard('user')->user()->workshop->contains($wk->id))
                                            <a href="{{ route('workshop.detail', ['slug' => $wk->slug_judul]) }}" class="btn default-btn1"><span class="label">Buka </span></a>
                                        @else
                                            <a href="{{ route('workshop.detail', ['slug' => $wk->slug_judul ]) }}" class="btn default-btn1"><span class="label">Detail</span></a>
                                        @endif
                                        @else
                                            <a href="{{ route('workshop.detail', ['slug' => $wk->slug_judul ]) }}" class="btn default-btn1"><span class="label">Detail</span></a>
                                    @endif
                            </div>
                        </div>
                    @endforeach 
                    </div>
                @else
                    <center>Belum ada Workshop</center>
                @endif
        </div>
    </section>
@endsection