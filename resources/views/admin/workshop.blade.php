@extends('admin_layout')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="module message">
        <div class="module-head">
            <h3>Workshop - Jahitin.com</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="{{route('tambahworkshop.admin')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <label class="control-label">Gambar (max 2 MB)</label>
                    <div class="controls">
                        <input type="file" id="thumb" name="image" accept="image/*" required>
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
                    <label class="control-label" for="basicinput">Link Grup WhatsApp</label>
                    <div class="controls">
                        <input type="text" id="url" name="url" placeholder="Link WA..." class="span8"
                               required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Kode</label>
                    <div class="controls">
                        <input type="text" id="kode" name="kode" placeholder="Type something here..." class="span8"
                               required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Open mulai Tgl</label>
                    <div class="controls">
                        <input type="date" id="start_tgl" name="start_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Close pada Tgl</label>
                    <div class="controls">
                        <input type="date" id="end_tgl" name="end_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Kategori</label>
                    <div class="controls">
                        <select id="kategori_id" name="kategori_id" class="span4" required>
                            @foreach( \App\Kategori::all() as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Workshop Kit</label>
                     <div class="controls">
                         <textarea id="summary-ckeditor4" name="kit" required></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Tempat</label>
                    <div class="controls">
                        <input type="text" id="tampat" name="tempat" placeholder="Type something here..." class="span8"
                               required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Tanggal Penyelenggaraan</label>
                    <div class="controls">
                        <input type="date" id="waktu" name="waktu" required>
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
                    <label class="control-label" for="basicinput">Jam</label>
                    <div class="controls">
                        <div class="input-append input-group-append">
                            <input class="span2" id="jam1" style="border:1px solid #ddd;" required><span class="add-on">  --  </span>
                            <input class="span2" id="jam2" required style="border:1px solid #ddd;"><span class="add-on"> WIB</span>
                            <input type="hidden" id="jam" name="jam">
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Kota</label>
                    <div class="controls">
                        <input type="text" id="kota" name="kota" placeholder="Type something here..." class="span8"
                               required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Harga</label>
                    <div class="controls">
                        <div class="input-append">
                            <input type="number" id="harga" name="harga" class="span8" required><span class="add-on">Rp</span>
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Harga SALE</label>
                    <div class="controls">
                        <div class="input-append">
                            <input type="number" id="sale" name="sale" class="span8" required><span class="add-on">Rp</span>
                        </div>
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
                    <label class="control-label">Certificate</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="certificate" value="YA" required>
                            Ya
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="certificate" value="TIDAK">
                            Tidak
                        </label>
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
                        <textarea class="form-control" id="summary-ckeditor1" name="alat" required></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Bahan</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor2" name="bahan" required></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Cara</label>
                    <div class="controls" style="width:76%;">
                        <textarea class="form-control" id="summary-ckeditor3" name="cara" required></textarea>
                    </div>
                </div>
                <br><br>
                <div class="control-group">
                    <label class="control-label">Sertifikat (.jpeg)</label>
                    <div class="controls">
                        <input type="file" name="sertif" accept="image/jpeg" required>
                    </div>
                </div>
                <br><br>
                <div class="control-group">
                    <label class="control-label">Modul PDF</label>
                    <div class="controls">
                        <input type="file" name="modul" accept="application/pdf" required>
                    </div>
                </div>
                <br><br>
                <div class="control-group">
                    <div class="table-responsive">
                        <span id="result"></span>
                        <table class="table table-bordered table-striped" id="user_table">
                            <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tampilkan</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="tampil" value="1" required>
                            YA
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="tampil" value="0">
                            TIDAK
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary" onclick="gabung()">Simpan</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><input type="file" id="gmbr" name="gambar[]" class="form-control" accept="image/*"/></td>';
                html += '<td><input type="text" id="teks" name="teks[]" class="form-control" /></td>';
                if (number > 1) {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Hapus</button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest("tr").remove();
            });

        });
    </script>
    <script>
        var uploadField = document.getElementById("thumb");
        uploadField.onchange = function () {
            if (this.files[0].size > 2097152) {
                alert("File Gambar terlalu besar!");
                this.value = "";
            }
        }
    </script>
    <script type="text/javascript">
        function gabung() {
            var jam1 = document.getElementById('jam1').value;
            var jam2 = document.getElementById('jam2').value;
            var str1 = " - ";
            var str2 = " WIB";
            document.getElementById('jam').value = jam1.concat(str1, jam2, str2);
        }
    </script>
@endsection
