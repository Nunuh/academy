@extends('layout')
@section('judul')
Tentang | Jahitin Academy
@endsection
@section('isi')
<div class="page-title-area page-title-style-two item-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('home')}}">Beranda</a></li>
                        <li>Tentang</li>
                    </ul>
                    <h2>Tentang Kami</h2>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start About Area -->
        <section class="about-area pb-70">
            <div class="container">
                <div class="about-inner-area">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="about-text">
								<h3 style="font-weight:600;">Apa?</h3>
                                <p align="left" style="color:#000;font-size:14px;">Sebuah wadah bertumbuh untuk para penjahit. Melalui platform ini penjahit dapat  meningkatkan kompetensi serta menampilkan portofolio jahitan mereka agar penjahit dapat lebih mudah mengakses kebutuhan pasar fesyen lokal dan internasional.</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="about-text">
								<h3 style="font-weight:600;">Mengapa?</h3>
                                <ol style="list-style-type:disc;font-size:14px;">
									<li>Beberapa penjahit di Indonesia belum memiliki standar</li>
									<li>Kompetensi penjahit belum mampu tercatat dengan baik</li>
									<li>Susahnya mengakses materi pembelajaran dan pelatihan dari rumah</li>
									<li>Jumlah penjahit yang memiliki SOP penjahit sangat rendah</li>
									<li>Tingginya tingkat ketidakpuasan pelanggan terhadap layanan jahit konvensional</li>
									<li>Kompetensi yang dimiliki penjahit tidak sesuai dengan kebutuhan pasar</li>
								</ol>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
							<div class="about-text" >
								<h3 style="font-weight:600;">Bagaimana?</h3>
								<p align="left" style="color:#000;font-size:14px;">Peserta merupakan penjahit yang sudah memiliki akun yang sudah terverifikasi.</p>	
                                
							</div>
						</div>
					</div>
				</div>
				<br>
					<span class="sub-title" style="font-size:30px;">Mitra Kami</span>

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

            <div id="particles-js-circle-bubble-4"></div>
        </section>
        <!-- End About Area -->

@endsection