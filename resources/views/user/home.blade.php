@extends('layout')
@section('judul')
    Beranda | Jahitin Academy
@endsection
@section('isi')
<section class="main-banner-wrapper">
        <div class="container">
                <h1 class="h1-home">Platform Belajar Menjahit <a href="#" class="typewrite" data-period="2000" data-type='[ "Kapan", "Dimana"]'><span class="wrap"></span></a> Saja</h1>
            <div class="banner-wrapper-content">
                <p>Kamu bisa meningkatkan kompetensi serta skill menjahit dengan mengakses workshop melalui website ini</p>

                <form action="{{ route('user.search')  }}" method="get">
                    <input name="search" type="text" class="input-search" placeholder="Ingin mencari workshop apa?">
                    <button type="submit">Cari</button>
                </form>
            </div>
             <section class="home-slides owl-carousel owl-theme  pt-70 pb-70">
            <div class="main-banner item-bg1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="main-banner-content">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-banner item-bg2">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="main-banner-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-banner item-bg3">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                                <style>
                                    .btn-akuna{
                                        background:#c82228;border-color:#c82228;font-size:14px;border-radius:10px;padding:10px 20px;margin-right:130px;position:absolute;right:25px;bottom:200px;
                                    }
                                    @media only screen and (max-width: 767px) {
                                    .btn-akuna{
                                        background:#c82228;border-color:#c82228;font-size:6px;border-radius:10px;padding:3px 5px;margin-right:20px;position:absolute;right:1.5rem;bottom:4rem;
                                    }
                                }
                                </style>
                                <a href="{{ route('user.regpage')}}" class="default-btn btn-akuna">Buat Akun Anda Di Sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </section>
   
        
    <section class="blog-area pt-70">
        <div class="container">
             <div class="section-title text-left">
                <span class="sub-title">Pilihan Workshop</span>
                <h2>Workshop Terbaru</h2>
                <a href="{{ route('workshop')}}" class="default-btn4"><span class="label">SELENGKAPNYA</span></a>
            </div>
            <div class="courses-slides owl-carousel owl-theme">
                @foreach($works as $ws)
                    <div class="single-courses-box mb-30" style="border:1px solid#ddd;">
                        <div class="courses-image">
                            <a href="{{ route('workshop.detail', ['slug' => $ws->slug_judul ]) }}">
                             <img src="{{ asset('images/workshop/'.$ws->image) }}" alt="image" class="fit-imge" style="object-position:left;">
                                <div class="courses-tag">
                                    {{ ($ws->harga - $ws->sale) / $ws->harga * 100  }}%
                                </div>
                            </a>
                        </div>
                        <div class="courses-diskon">
                            <s class="strikeout" style="font-size:12px;">Rp {{ number_format($ws -> harga) }}</s>
                        </div>
                        <div class="courses-harga">Rp {{ number_format($ws -> sale) }}</div>
                        <div class="courses-content"><br>
                            <div class="course-author d-flex align-items-center">
                                <a href="{{ route('user.institution', ['slug' => $ws->institution->nama]) }}"><img src="{{ asset('images/insti/'.$ws->institution->gambar) }}" class="rounded-circle mr-2 institusi-home" style="display:inline-block;">
                                <span>{{ $ws->institution->namaInstansi }}</span></a>
                            </div>
                            <h3><a href="{{ route('workshop.detail', ['slug' => $ws->slug_judul ]) }}" class="d-inline-block judul-home">{{ $ws->judul }}</a></h3>
                            <div style="width:100%">
                                <i class='bx bx-badge'></i><span class="badge-home"> {{$ws->level}} &nbsp;&nbsp;&nbsp;&nbsp; @if($ws->certificate == 'YA') <i class='bx bx-certification'></i> Sertifikat @endif </span><span class="tersedia">Tersedia </span>
                            </div>
                        </div>

                        <div class="courses-box-footer" style="padding:0;" >
                            @if(Auth::guard('user')->check())
                                @if(Auth::guard('user')->user()->workshop->contains($ws->id))
                                        <a href="{{ route('workshop.detail', ['slug' => $ws->slug_judul]) }}" class="btn default-btn1"><span class="label">Buka </span></a>
                                    @else
                                        <a href="{{ route('workshop.detail', ['slug' => $ws->slug_judul ]) }}" class="btn default-btn1"><span class="label">Detail</span></a>
                                    @endif
                                    @else
                                        <a href="{{ route('workshop.detail', ['slug' => $ws->slug_judul ]) }}" class="btn default-btn1"><span class="label">Detail</span></a>
                                @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="how-it-works-area pt-70 pb-70">
        <div class="container">
            <div class="section-title">
                <!--<span class="sub-title">Temukan Kelas</span>-->
                <h2>Bagaimana Cara Menggunakan Jahitin Academy?</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-work-process mb-30">
                        <div class="icon">
                            <img src="{{ asset('img/ico-registrasi.png') }}">
                        </div>
                        <h3>Registrasi Akun</h3>
                        <p class="temukan-p">Peserta yang ingin mengikuti workshop di Jahitin Academy dan terverifikasi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-work-process mb-30">
                        <div class="icon">
                            <img src="{{ asset('img/ico-pencarian.png') }}">
                        </div>
                        <h3>Cari Workshop</h3>
                        <p class="temukan-p">Pilihlah workshop yang sesuai dengan minat dan keahlian yang kamu inginkan</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="single-work-process mb-30">
                        <div class="icon">
                            <img src="{{ asset('img/ico-daftar.png') }}">
                        </div>
                        <h3>Daftar</h3>
                        <p class="temukan-p">Ikuti workshop hingga akhir dan kamu akan mendapatkan sertifikat di akhir workshop</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partner-area ptb-70" style="background:#f7f5f4;">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Mitra Kami</span>
                <h2>Kami bekerja sama dengan </h2>
            </div>

            <div class="partner-slides owl-carousel owl-theme">
            @foreach($part as $partner)
                <div class="single-partner-item">
                    <a href="{{ $partner->url }}" target="_blank" class="hrefpartner">
                        <img src="{{ asset('images/partner/'.$partner->image) }}" alt="image">
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <section class="feedback-area ptb-100">
        <div class="container">
            <div class="feedback-slides owl-carousel owl-theme">
                <div class="single-feedback-item">
                    <p align="justify">“Setelah tim Jahitin Academy ke Sumba, para penjahit dan penenun di daerah kami jadi terbuka untuk melakukan inovasi dan mampu menciptakan produk sendiri. Terima kasih Jahitin.com”</p>
                    <div class="info">
                        <h3>Ibu Dewi</h3>
                        <span>Disperindag Kabupaten Sumba Barat</span>
                        <img src="{{ asset('img/dewi.jpg')}}" class="shadow rounded-circle" alt="image">
                    </div>
                </div>

                <div class="single-feedback-item">
                    <p align="justify">“Berkat Jahitin Academy, kami bisa mendapat pelajaran baru tentang kombinasi warna-warna untuk kain tenun Sumba.”</p>

                    <div class="info">
                        <h3>Mama Minto</h3>
                        <span>Penenun - Sumba Barat</span>
                        <img src="{{asset('img/minto.jpg')}}" class="shadow rounded-circle" alt="image">
                    </div>
                </div>

                <div class="single-feedback-item">
                    <p align="justify">“Setelah mengikuti Jahitin Academy, kami tidak lagi membuang kain perca tenun karena sisa kain kami jahit menjadi barang yang bernilai jual.”</p>

                    <div class="info">
                        <h3>Elisabeth Kallu</h3>
                        <span>Penjahit - Sumba Barat Daya</span>
                        <img src="{{ asset('img/eli.jpg')}}" class="shadow rounded-circle" alt="image">
                    </div>
                </div>

                <div class="single-feedback-item">
                    <p align="justify">“Berkat Jahitin Academy saya dapat ikut berkontribusi untuk ambil peran di saat pandemi COVID19 dan saya jadi mendapat banyak pesanan masker dari pola yang diberikan.”</p>
                    <div class="info">
                        <h3>Orrinda Fardian</h3>
                        <span>Relawan - Jahitin Academy</span>
                        <img src="{{ asset('img/orinda.jpg')}}" class="shadow rounded-circle" alt="image">
                    </div>
                </div>

                <div class="single-feedback-item">
                    <p align="justify">“Jahitin sudah membantu para penjahit di Jakarta yang tidak bisa bekerja karena terdampak Covid19 untuk membuat masker dan APD yang di salurkan ke rumah sakit atau instansi lain secara cepat dan berkualitas.”</p>

                    <div class="info">
                        <h3>Ira Anggraini</h3>
                        <span>Penjahit - Tangerang</span>
                        <img src="{{ asset('img/ira.jpg')}}" class="shadow rounded-circle" alt="image">
                    </div>
                </div>

                <div class="single-feedback-item">
                    <p align="justify">“Saya jadi mudah untuk membeli perlengkapan menjahit seperti karet dan kain, pengiriman terjamin dan harganya juga masuk akal.”</p>

                    <div class="info">
                        <h3>Rambu Merlyn</h3>
                        <span>Penjahit - Sumba Barat</span>
                        <img src="{{ asset('img/merlyn.jpg')}}" class="shadow rounded-circle" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="become-instructor-partner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="become-instructor-partner-content bg-color">
                        <h2>Pengguna</h2>
                        <p>Kamu harus membuat akun terverikasi di Jahitin Academy terlebih dahulu.</p>
                        <a href="{{ route('user.regpage') }}" class="default-btn"><i
                                    class='bx bx-plus-circle icon-arrow before'></i><span class="label">Daftar</span><i
                                    class="bx bx-plus-circle icon-arrow after"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="become-instructor-partner-image bg-image1 jarallax" data-jarallax='{"speed": 0.3}'>
                        <img src="{{ asset('img/pengguna.jpg')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="become-instructor-partner-image bg-image2 jarallax" data-jarallax='{"speed": 0.3}'>
                        <img src="{{ asset('img/partner.jpg')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="become-instructor-partner-content">
                        <h2>Mitra</h2>
                        <p>Jika kamu adalah instansi / perusahaan / perseorangan yang tertarik  menjadi bagian untuk mendukung  terwujudnya ekosistem penjahit lebih baik lagi, kami membuka program mitra, silahkan hubungi kami.</p>
                        <a href="{{ route('mitra') }}" class="default-btn"><i class='bx bx-plus-circle icon-arrow before'></i><span
                                    class="label">Daftar Mitra</span><i
                                    class="bx bx-plus-circle icon-arrow after"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection