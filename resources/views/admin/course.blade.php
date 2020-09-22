@extends('admin_layout')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="module message">
        <div class="module-head">
            <h3>Course - Jahitin.com</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="{{ route('tambahcourse.admin') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <label class="control-label">Thumbnail (Max 2 MB)</label>
                    <div class="controls">
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Link Youtube</label>
                    <div class="controls">
                        <input class="span8" type="text" id="video" name="video" value="https://www.youtube.com/embed/" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Judul</label>
                    <div class="controls">
                        <input type="text" id="judul" name="judul" placeholder="Type something here..." class="span8"
                               required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Kode</label>
                    <div class="controls">
                        <input type="text" id="kode" name="kode" placeholder="Type something here..." class="span8" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Tanggal Mulai</label>
                    <div class="controls">
                        <input type="date" id="start_tgl" name="start_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Tanggal Berakhir</label>
                    <div class="controls">
                        <input type="date" id="end_tgl" name="end_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Link Pembelian</label>
                    <div class="controls">
                        <input type="text" id="url" name="url" placeholder="Link Sirclo.." class="span8"
                               required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Subject</label>
                    <div class="controls">
                        <input type="text" id="subject" name="subject" placeholder="Type something here..."
                               class="span8" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Harga</label>
                    <div class="controls">
                        <div class="input-append">
                            <span class="add-on">Rp</span>
                            <input id="harga" name="harga" class="span8" style="border:1px solid #ddd;" required>
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Harga SALE</label>
                    <div class="controls">
                        <div class="input-append">
                            <span class="add-on">Rp</span>
                            <input id="sale" name="sale" class="span8" style="border:1px solid #ddd;" required>
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Durasi</label>
                    <div class="controls">
                        <div class="input-append input-group-append">
                            <input class="span2" id="menit" style="border:1px solid #ddd;" required><span class="add-on" >Menit</span>
                            <input class="span2" id="detik" required style="border:1px solid #ddd;"><span class="add-on">Detik</span>
                            <input type="hidden" id="durasi" name="durasi">
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Kategori</label>
                    <div class="controls">
                        <select id="kategori_id" name="kategori_id" class="span4" required>
                            @foreach( \App\Kategori::all() as $kate)
                                <option value="{{ $kate->id }}">{{ $kate->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Institusi</label>
                    <div class="controls">
                        <select name="institution_id" class="span4" required>
                            @foreach(\App\Institution::all() as $insti)
                                <option value="{{ $insti->id }}">{{ $insti->namaInstansi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Level</label>
                    <div class="controls">
                        <select id="level" name="level" class="span4" required>
                            <option value="Dasar">Dasar</option>
                            <option value="Menengah">Menengah</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Language</label>
                    <div class="controls">
                        <select id="language" name="language" class="span4" required>
                            <option value="Indonesia">Indonesia</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Subtitle</label>
                    <div class="controls">
                        <select id="subtitle" name="subtitle" class="span4" required>
                            <option value="Indonesia">Indonesia</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Certificate</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="certificate" id="certificate" value="YA" required>
                            Ya
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="certificate" id="certificate" value="TIDAK">
                            Tidak
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Quizzes</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="quizzes" id="quizzes" value="YA" required>
                            Ya
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="quizzes" id="quizzes" value="TIDAK">
                            Tidak
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Syllabus</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor1" name="syllabus" required></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Deskripsi</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor" name="deskripsi" required></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Alat</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor" name="alat" required></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Bahan</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor" name="bahan" required></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Cara</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor" name="cara" required></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tampilkan</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="tampil" id="tampil" value="1" required>
                            Ya
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="tampil" id="tampil" value="0">
                            Tidak
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary" onclick="join()">Submit Form</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <script>
        var uploadField = document.getElementById("thumbnail");
        uploadField.onchange = function () {
            if (this.files[0].size > 2097152) {
                alert("File Gambar terlalu besar!");
                this.value = "";
            }
        }
    </script>
    <script>
        var upload = document.getElementById("vid");
        upload.onchange = function () {
            if (this.files[0].size > 52428800) {
                alert("File Video terlalu besar!");
                this.value = "";
            }
        }
    </script>
    <script type="text/javascript">
        function join() {
            var menit = document.getElementById('menit').value;
            var detik = document.getElementById('detik').value;
            var str1 = " menit ";
            var str2 = " detik";
            document.getElementById('durasi').value = menit.concat(str1, detik, str2);
        }
    </script>
    
@endsection
