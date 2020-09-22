@extends('layout')
@section('judul')
Kontak | Jahitin Academy
@endsection
@section('isi')
        <div class="page-title-area item-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li>Kontak</li>
                    </ul>
                    <h2>Kontak Kami</h2>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Contact Info Area -->
        <section class="contact-info-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-info-box mb-30">
                             <a href="mailto:cs@jahitin.com">
                            <div class="icon">
                                <i class='bx bx-envelope'></i>
                            </div>
                            <h3>Email</h3>
                            <p>cs@jahitin.com</p></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-info-box mb-30">
                        <a href="https://www.instagram.com/jahitin_com/" target="_blank">
                            <div class="icon"><i class='bx bxl-instagram'></i>
                            </div>
                            <h3>Instagram</h3>
                            <p>jahitin_com</p></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                        <div class="contact-info-box mb-30">
                        <a href="https://api.whatsapp.com/send?phone=6281217033258&text=Halo Admin Jahitin Academy%21%20Saya ingin bertanya">
                            <div class="icon"><i class='bx bxl-whatsapp'></i>
                            </div>
                            <h3>Whatsapp</h3>
                            <p>+62 812-1703-3258</p></a>
                        </div>
                    </div>
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7913.516687584331!2d112.74301011461229!3d-7.380957094674151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e5d044a84913%3A0xb5b5b94485457b4!2sJahitin.com!5e0!3m2!1sen!2sid!4v1594820166131!5m2!1sen!2sid" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div id="particles-js-circle-bubble-2"></div>
        </section>
        <!-- End Contact Info Area -->

        <!-- Start Contact Area -->
            <div id="particles-js-circle-bubble-3"></div>
        <!-- End Contact Area -->

        <!-- Maps -->
        
        <!-- End Maps -->
@endsection