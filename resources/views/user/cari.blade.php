@extends('layout')
<title> Hasil Pencarian </title>
@section('isi')

    <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>Pencarian</li>
                </ul>
                <h2>Pencarian </h2>
            </div>
        </div>
    </div>

             
    <section class="courses-area pt-70 pb-70" style="padding-bottom:70px;">
        <div class="container">
            <div class="banner-wrapper-content">
                <form action="{{ route('user.search')  }}" method="get">
                    <input name="search" type="text" class="input-search" placeholder="Ingin mencari workshop apa?" value="{{ $search }}">
                    <button type="submit">Cari</button>
                </form>
            </div>
            <h2 style="font-weight: 400;">Workshop</h2><br>
            @if(count($work) > 0 )
                <div class="courses-slides owl-carousel owl-theme" >
                    @foreach($work as $wk)
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
                <center>Hasil Tidak ditemukan</center>
            @endif
        </div>
    </section>
@endsection
