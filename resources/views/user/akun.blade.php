@extends('layout')
<title> Akun | Jahitin Academy </title>
@section('isi')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
    
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
        p{
            font-size:14px;
        }
        .disabled {
            pointer-events: none;
            cursor: default;
            background: #eee;
        }

        .file {
            visibility: hidden;
            position: absolute;
        }

        .akunborder {
            padding-left: 30px;
        }

        .akunborder2 {
            padding-left: 50px;
        }

        .akun-teks-center {

        }

        @media (max-width: 480px) {
            .akunborder {
                padding-left: 0px;
            }

            .akunborder2 {
                padding-left: 15px;
            }

            .akun-teks-center {
                text-align: center;
            }
        }
    </style>

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Akun</li>
                </ul>
                <h2>Profil Akun</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start My Account Area -->
    <section class="my-account-area ptb-100">
        <div class="container">
            <div class="myAccount-profile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-12" style="padding-top:25px;">
                            <center>
                                <form id="user_save_profile_form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="profile_pic">
                                    <img  class="hp-foto-profil" id="image_user" style="object-fit:cover;"
                                         src="{{ asset('images/user/'.Auth::guard('user')->user()->ava) }}"
                                         alt="User Image" onerror=this.src="{{ asset('images/user/icon.png') }}">
                                    <div>
                                        <span style="margin:0;font-weight: 600;font-size: 12px;padding: 10px 0px 0px 0px;cursor:pointer;color: #7e1037;width: 100%;letter-spacing: 1px;">Ubah Foto</span></label>
                                        <input onchange="doAfterSelectImage(this)" type="file" style="display: none;" id="profile_pic" name="ava"/>
                                    </div>
                                </form>
                            </center>
                        </div>
                        <div class="col-md-3 col-12 akunborder">
                            <div class="profile-content">
                                <div class="akun-teks-center">
                                    <h3>
                                        @if(Auth::guard('user')->user()->fullname != null )
                                            {{ Auth::guard('user')->user()->fullname }}
                                        @else
                                            <p></p>
                                        @endif</h3>
                                    @if(Auth::guard('user')->user()->verifikasi == 1)
                                        <span style="background:#339535;color:#fff;font-size:10pt; padding:5px"><i
                                                class='bx' style="font-size:1em;"></i> Akun sudah terverifikasi</span>
                                    @else
                                        <span style="background:#d90000;color:#fff;font-size:10pt; padding:5px"><i
                                                class='bx' style="font-size:1em;"></i> Akun belum terverifikasi</span>
                                    @endif
                                </div>
                                <ul class="contact-info">
                                   <li><i class='bx bx-envelope'></i><p>{{ Auth::guard('user')->user()->email }}</p></li>
                                    <li><i class='bx bx-phone'></i>
                                        @if(Auth::guard('user')->user()->telp != null )
                                            <p>{{ Auth::guard('user')->user()->telp }}</p>
                                        @else
                                            <p>No telepon belum diisi</p>
                                        @endif
                                    </li>
                                    <li><i class='bx bx-map'></i>
                                        @if(Auth::guard('user')->user()->domisili != null )
                                            <p>{{ Auth::guard('user')->user()->domisili }}</p>
                                        @else
                                            <p>Alamat belum diisi</p>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 akunborder2" style="padding-bottom: 20px;">
                            <div class="row">
                                <div class="col-12" style="padding:20px 15px;">
                                    <h5>Keahlian</h5>
                                    @if(Auth::guard('user')->user()->profesi()->count() > 0)
                                        @foreach(Auth::guard('user')->user()->profesi as $profes)
                                            <span
                                                style="background:#deedff;color:#000;font-size:8pt; padding:5px 10px; border-radius:25px;">{{$profes->nama}}</span>
                                        @endforeach
                                    @else
                                        <p>Belum memilih keahlian</p>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <h5>Hasil jahit</h5>
                                    <section class="gallery-area">
                                        <div class="team-slides owl-carousel owl-theme" style="margin:0px;">
                                            @if(Auth::guard('user')->user()->portofolio()->count() > 0 )
                                                @foreach(Auth::guard('user')->user()->portofolio as $porto)
                                                    <img class="hp-foto" style="height:100px;"
                                                         src="{{ asset('images/porto/'.$porto->photo) }}"
                                                         data-original="{{ asset('images/porto/'.$porto->photo) }}">
                                                @endforeach
                                            @else
                                                <p style="width:250px">Belum ada hasil jahit</p>
                                            @endif
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset(Auth::guard('user')->user()->foto) && !Auth::guard('user')->user()->verifikasi)
                <script type="text/javascript">
                    //Call the method on pageload
                    $(window).load(function () {
                        //Disply the modal popup
                        $('#myModal').modal('show');
                    });
                </script>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="col-md-12 xs-6">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <center>
                                        <img src="{{ asset('img/verify-ico.jpg') }}" style="height:150px;">
                                        <h6 style="color:#7e1037;">Selamat, kamu berhasil melakukan pendaftaran!</h6>
                                        <p>Jika akun Anda belum terverifikasi selama 1 x 24 jam, pastikan data diri Anda
                                            lengkap dan foto KTP Anda sudah benar</p>
                                        <a href="{{ route('home')}}" class="default-btn"
                                           style="border-radius:30px;padding: 12px 25px 12px 25px;">Oke</a></center>
                                </div>
                                <div class="modal-footer" style="padding:0;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Jika akun Anda belum terverifikasi selama 1 x 24 jam, pastikan data diri Anda lengkap dan foto KTP
                    Anda sudah benar
                </div>
            @endif
            <div class="myAccount-navigation">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#profil"
                                          class="nav-tabe {{old('tab') == '' ? 'active' : null }}" role="tab"
                                          aria-controls="profil" title="Profil Akun"><i class='bx bx-user'></i>Data Diri</a>
                    </li>
                    <li @if(Auth::guard('user')->user()->fullname == null)
                        class="disabled"
                        @else class="active"
                        @endif><a data-toggle="tab" href="#porto"
                                  class="nav-tabe {{old('tab') == 'porto' ? 'active' : null}}" role="tab"
                                  aria-controls="porto" title="Portofolio"><i class='bx bx-photo-album'></i>Hasil Jahit</a>
                    </li>
                    <li @if(Auth::guard('user')->user()->fullname == null || Auth::guard('user')->user()->portofolio()->count() < 3) class="disabled"
                        @else class="active" @endif><a data-toggle="tab" href="#akun"
                                                       class="nav-tabe {{old('tab') == 'akun' ? 'active' : null}}"
                                                       role="tab"
                                                       aria-controls="akun" title="Verifikasi Akun"><i
                                class='bx bx-check-square'></i>Verifikasi
                        </a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="porto" class="tab-pane fade{{old('tab') == 'porto' ? '-in active' : null}}" role="tabpanel">
                    <div class="myAccount-content">
                        <div class="row">
                            <div class="col-md-4">
                                @if(Auth::guard('user')->user()->portofolio()->count() >= 9)
                                    <form class="edit-account">
                                        @csrf
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label>Unggah Hasil Jahit</label>
                                                <label class="file">
                                                    <input type="file" id="file" aria-label="File browser example"
                                                           name="photo" accept="image/*" required>
                                                    <span class="file-custom"></span>
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label>Judul Hasil Jahit</label>
                                                <input class="form-control" type="text" name="judul" required>
                                            </div>
                                            <br>
                                            Foto yang kamu unggah telah mencapai batas maksimal
                                        </fieldset>
                                    </form>
                                @else
                                    <form class="edit-account" action="{{ route('tambah.porto') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Unggah Hasil Jahit</label>
                                            <input type="file" id="file" class="file" name="photo" accept="image/*"
                                                   required>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" style="height:40px;" disabled
                                                       placeholder="Upload File" aria-label="Upload File"
                                                       aria-describedby="basic-addon1">
                                                <div class="input-group-append">
                                                    <button class="browse input-group-text" id="basic-addon2"
                                                            style="color:#fff;background-color: #7E1037;"><i
                                                            class='bx bxs-photo-album'></i> Pilih Foto
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Hasil Jahit</label>
                                            <input class="form-control" type="text" name="judul">
                                        </div>
                                        <br>
                                        <span style="color:#F00;font-size:9pt;">*Unggah hasil jahit satu persatu <br>
                                        *Minimal 3 foto untuk melakukan proses verifikasi akun</span><br><br>
                                        <button type="submit" class="default-btn" style="padding: 10px 30px 10px 30px;">
                                            Unggah
                                        </button>
                                        <br><br>
                                        <center><span style="color:#555;position:relative;">2 dari 3</span><br></center>
                                    </form>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="edit-account">
                                    <section class="gallery-area">
                                        <h5>Hasil Jahitan saya</h5>
                                        <div class="row">
                                            @if(Auth::guard('user')->user()->portofolio()->count() > 0 )
                                                @foreach(Auth::guard('user')->user()->portofolio as $porto)
                                                    <div class="col-md-4 col-6" style="padding:0px 8px;">
                                                        <div class="single-gallery-item mb-30">
                                                            <img class="hp-foto"
                                                                 src="{{ asset('images/porto/'.$porto->photo) }}"
                                                                 data-original="{{ asset('images/porto/'.$porto->photo) }}">
                                                            <br><br>
                                                            <center><h6>{{ $porto->judul }}</h6></center>
                                                            <a style="position:absolute;bottom:50px; background:#fff; padding:5px; border-radius:10px; right:20px;font-size:18pt;"
                                                               href="{{ route('hapus.porto', ['id' => $porto->id]) }}">
                                                                <i class='bx bxs-trash'></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12">
                                                    <p>Belum ada hasil jahit</p>
                                                </div>
                                            @endif
                                        </div>
                                        @if(Auth::guard('user')->user()->portofolio()->count() >= 3)
                                            <center><a class="default-btn"  style="padding: 10px 30px 10px 30px;"
                                                       href="{{route('user.loadakun', ['id'=>Auth::guard('user')->user()->id])}}">Simpan</a></center>
                                        @endif
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="profil" class="tab-pane fade{{old('tab') == '' ? '-in active' : null}} " role="tabpanel">
                    <div class="myAccount-content">
                        <form class="edit-account" action="{{ route('ubahAkun.user') }}" method="post"
                              enctype="multipart/form-data">
                            <fieldset @if(Auth::guard('user')->user()->verifikasi==1) @endif>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap <span class="required">*</span></label>
                                            <input name="fullname" type="text" class="form-control"
                                                   placeholder="Etik Sapitri"
                                                   value="{{ Auth::guard('user')->user()->fullname }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Keahlian<span class="required">*</span></label><br>
                                            @if(Auth::guard('user')->user()->profesi()->count() > 0)
                                                @foreach(Auth::guard('user')->user()->profesi as $prof)
                                                    <span
                                                        style="background:#ddd;font-size:8pt; padding:5px 10px; border-radius:25px;">{{ $prof->nama }}</span>
                                                @endforeach
                                                <a class="btn btn-default"
                                                   href="{{ route('editProfesi', ['id'=>Auth::guard('user')->user()->id]) }}"><i class='bx bxs-pencil'></i> Edit</a>
                                            @else
                                                <select name="profesi[]" id="multiple" class="js-states form-control"
                                                        multiple required>
                                                    @foreach(\App\User::PROFESI as $pro)
                                                        <option value="{{ $pro }}">{{ $pro }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin <span class="required">*</span></label>
                                            <select id="gender" name="gender" class="form-control" required
                                            @if(Auth::guard('user')->user()->verifikasi == 1)
                                                @endif>
                                                <option value="laki-laki"
                                                        @if(Auth::guard('user')->user()->gender == 'laki-laki') selected @endif>
                                                    Laki-laki
                                                </option>
                                                <option value="perempuan"
                                                        @if(Auth::guard('user')->user()->gender == 'perempuan') selected @endif>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Tempat, Tanggal Lahir<span class="required">*</span></label>
                                            <input name="tgl_lahir" value="{{ Auth::guard('user')->user()->tgl_lahir}}"
                                                   type="text" placeholder="Surabaya, 20 Januari 1998"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Domisili/Tempat Tinggal<span class="required">*</span></label>
                                            <input type="text" name="domisili" class="form-control"
                                                   placeholder="Jalan Jawa No.1"
                                                   value="{{ Auth::guard('user')->user()->domisili }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Provinsi<span class="required">*</span></label>
                                            <select id="provinsi" name="provinsi_id" class="provinsi form-control"
                                                    required>
                                                @if(isset(Auth::guard('user')->user()->provinsi))
                                                    <option
                                                        value="{{Auth::guard('user')->user()->provinsi_id}}">{{ Auth::guard('user')->user()->provinsi->nama }}</option>
                                                    <option> - Pilih Provinsi -</option>
                                                    @foreach($provinsi as $id => $nama)
                                                        <option value="{{$id}}">{{ $nama }}</option>
                                                    @endforeach
                                                @else
                                                    <option> - Pilih Provinsi -</option>
                                                    @foreach($provinsi as $id => $nama)
                                                        <option value="{{$id}}">{{ $nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Kota<span class="required">*</span></label>
                                            <select id="kota" name="kota_id" class="form-control" required>
                                                @if(Auth::guard('user')->user()->kota != null)
                                                    <option
                                                        value="{{Auth::guard('user')->user()->kota_id}}">{{ Auth::guard('user')->user()->kota->nama }}</option>
                                                @else
                                                    <option> - Pilih Kota -</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Kecamatan<span class="required">*</span></label>
                                            <select id="kecamatan" name="kecamatan_id" class="form-control" required>
                                                @if(Auth::guard('user')->user()->kecamatan != null)
                                                    <option
                                                        value="{{Auth::guard('user')->user()->kecamatan_id}}">{{ Auth::guard('user')->user()->kecamatan->nama }}</option>
                                                @else
                                                    <option> - Pilih Kecamatan -</option>

                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Kode Pos<span class="required">*</span></label>
                                            <input type="text" name="kodepos" class="form-control"
                                                   placeholder="60233"
                                                   value="{{ Auth::guard('user')->user()->kodepos }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Email<span class="required">*</span></label>
                                            <input name="email" type="email" class="form-control"
                                                   placeholder="etiksapitri@gmail.com"
                                                   value="{{ Auth::guard('user')->user()->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>No Handphone Aktif<span class="required">*</span></label>
                                            <input name="telp" type="number" class="form-control"
                                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeypress="return this.value.length < 13;" oninput="if(this.value.length>=13) { this.value = this.value.slice(0,13); }" placeholder="08978776757"  value="{{ Auth::guard('user')->user()->telp }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn"  style="padding: 10px 30px 10px 30px;">Simpan</button>
                                    </div>
                                </div>
                                <br>
                                <center><span style="color:#555;position:relative;">1 dari 3</span></center>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div id="akun" class="tab-pane fade{{old('tab') == 'akun' ? '-in active' : null}}" role="tabpanel">
                    <div class="myAccount-content">
                        <form class="edit-account" action="{{ route('ubahProfil.user') }}" method="post"
                              enctype="multipart/form-data">
                            @if(Auth::guard('user')->user()->verifikasi==1)
                                Akun telah berhasil diverifikasi
                            @else
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Alamat sesuai KTP<span class="required">*</span></label>
                                            <input type="text" name="alamat" class="form-control"
                                                   placeholder="Jalan Jawa No.1"
                                                   value="{{ Auth::guard('user')->user()->alamat }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>NIK <span class="required">*</span></label>
                                            <input type="number" name="nik" id="nik" class="form-control"
                                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeypress="return this.value.length < 16;" oninput="if(this.value.length>=16) { this.value = this.value.slice(0,16); }" minlength="14"
                                                   maxlength="16" placeholder="3578011010990005"
                                                   value="{{ Auth::guard('user')->user()->nik }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="form-group">
                                            @if(Auth::guard('user')->user()->foto == '' || Auth::guard('user')->user()->foto == null)
                                                <label>Unggah KTP <span class="required">*</span></label>
                                                <input type="file" name="foto" id="foto" accept="image/*" required><br>
                                                <span>Ambil Foto/Scan KTP Anda yang Terbaik</span>

                                            @else
                                                <span><strong>KTP Anda sudah terunggah</strong></span>
                                                <label> <span class="required">*</span><br>Jika akun Anda belum
                                                    terverifikasi selama 1 x 24 jam, pastikan data diri Anda lengkap dan
                                                    foto KTP Anda sudah benar
                                                </label>
                                                <input type="hidden" name="foto"
                                                       value="{{Auth::guard('user')->user()->foto}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <img width="200px"
                                                 src="{{ asset('images/ktp/' . Auth::guard('user')->user()->foto) }}"
                                                 alt="KTP" onerror=this.src="{{ asset('images/ktp/ktp.png') }}">
                                            @if(Auth::guard('user')->user()->verifikasi != 1)
                                                @if(isset(Auth::guard('user')->user()->foto))
                                                    <a class="btn-info btn-sm"
                                                       href="{{ route('user.hapusktp', ['id'=>Auth::guard('user')->user()->id]) }}">Hapus
                                                        KTP</a>
                                                @endif
                                            @else
                                                <span><strong>Akun Telah Diverifikasi</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">

                                        <span style="color:#F00;"><b>Catatan : </b>Data yang anda telah masukkan, pastikan telah sesuai dengan KTP</span><br><br>
                                        <button type="submit" class="default-btn" style="padding: 13px 25px 12px 25px;">
                                            Verifikasi
                                        </button>
                                    </div>
                                </div><br>
                                <center><span style="color:#555;position:relative;">3 dari 3</span></center>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        var data = new Array();
        $("#multiple").select2({
                placeholder: "--- Pilih/Tulis keahlian ---",
                tags: true,
                width: "resolve",
                maximumSelectionLength: 3,
                language: {
                    maximumSelected: function () {
                        var t = "Hanya bisa memilih tiga keahlian"
                        return t;
                    }
                }
            }
        ).on('change', function () {
            var teks = $(this).val();
            console.log(data);
            data.push(teks);
        });

        $(document).on("click", ".browse", function () {
            var file = $(this)
                .parent()
                .parent()
                .parent()
                .find(".file");
            file.trigger("click");
        });
        $(document).on("change", ".file", function () {
            $(this)
                .parent()
                .find(".form-control")
                .val(
                    $(this)
                        .val()
                        .replace(/C:\\fakepath\\/i, "")
                );
        });

        function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
        }
    </script>
    <script>
        $(function () {
            $('#provinsi').on('change', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{route('dropdown')}}',
                    data: {
                        id: $(this).val(),
                        _token: '{{csrf_token()}}'
                    },
                    success: function (data) {
                        $('#kota').empty();

                        $.each(data, function (i, item) {
                            $('#kota').append(new Option(item.nama, item.id));

                        });
                    },
                    error: function (data) {
                        $.each(data, function (i, item) {
                            $('#kota').append(new Option(item.nama, item.id));
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(function () {
            $('#kota').on('change', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{route('dropdown1')}}',
                    data: {
                        id: $(this).val(),
                        _token: '{{csrf_token()}}'
                    },
                    success: function (data) {
                        $('#kecamatan').empty();

                        $.each(data, function (i, item) {
                            $('#kecamatan').append(new Option(item.nama, item.id));
                        });
                    },
                    error: function (data) {
                        $.each(data, function (i, item) {
                            $('#kecamatan').append(new Option(item.nama, item.id));
                        });
                    }
                });
            });
        });
    </script>
    <script>
        function doAfterSelectImage(input) {
            readURL(input);
            uploadUserProfileImage();
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_user').attr('src', e.target.result);

                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function uploadUserProfileImage() {
            let myForm = document.getElementById('user_save_profile_form');
            let formData = new FormData(myForm);
            $.ajax({
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                url: '{{ route('user.foto') }}',
                success: function (response) {
                    if (response == 200) {
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text('Profile Saved Successfully.');
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);

                    } else if (response == 700) {
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'red');
                        $('#notifDiv').text('An error occured. Please try later');
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                    }
                }.bind($(this))
            });
        }
    </script>
@endpush
