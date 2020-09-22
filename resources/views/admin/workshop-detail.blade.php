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
            <h3>Workshop Detail - {{ $wk->judul }}</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="{{ route('editworkshop.admin', ['id' => $wk->id]) }}"
                  method="post" enctype="multipart/form-data" id="editWorkshop_{{ $wk->id }}">
                @csrf
                <div class="control-group">
                    <label class="control-label">Gambar (max 2 MB)</label>
                    <div class="controls">
                        <img src="{{ asset('images/workshop/'.$wk->image) }}" width="150px">
                        <input name="gambar" type="file" id="thumb" accept="image/*">
                        <input type="hidden" name="image" value="{{$wk->image}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kode</label>
                    <div class="controls">
                        <input class="span8" type="text" value="{{ $wk->kode }}" name="kode" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Judul</label>
                    <div class="controls">
                        <input class="span8" type="text" value="{{ $wk->judul }}" name="judul" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Open mulai Tgl</label>
                    <div class="controls">
                        <input class="span8" type="date" value="{{ $wk->start_tgl }}" name="start_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Close pada Tgl</label>
                    <div class="controls">
                        <input class="span8" type="date" value="{{ $wk->end_tgl }}" name="end_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Workshop Kit</label>
                    <div class="controls">
                         <textarea id="summary-ckeditor4" name="kit" required>{{ (is_null($wk->kit)) ? '-' : $wk->kit }}</textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">URL</label>
                    <div class="controls">
                        <input class="span8" type="text" value="{{ $wk->url }}" name="url" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Institution</label>
                    <div class="controls">
                        <select name="institution_id" class="span4" required>
                            @foreach( \App\Institution::all() as $ins)
                                <option @if($wk->institution_id == $ins->id) selected
                                        @endif value="{{ $ins->id }}">{{ $ins->namaInstansi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kategori</label>
                    <div class="controls">
                        <select name="kategori_id" class="span4" required>
                            @foreach( \App\Kategori::all() as $kategori)
                                <option @if($wk->kategori_id == $kategori->id)selected
                                        @endif value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat</label>
                    <div class="controls">
                        <input class="span8" type="text" value="{{ $wk->tempat }}" name="tempat" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tanggal Penyelenggaraan</label>
                    <div class="controls">
                        <input class="span8" type="date" value="{{ $wk->waktu }}" name="waktu" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Jam</label>
                    <div class="controls">
                        <div class="input-append input-group-append">
                            <?php $tim = explode(' ', $wk->jam) ?>
                            <input class="span2" id="jam1" style="border:1px solid #ddd;" value="{{ $tim[0] }}"
                                   required><span class="add-on"> - </span>
                            <input class="span2" id="jam2" required style="border:1px solid #ddd;"
                                   value="{{ $tim[2] }}"><span class="add-on"> WIB</span>
                            <input type="hidden" id="jam" value="{{ $wk->jam }}" name="jam">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kota</label>
                    <div class="controls">
                        <input class="span8" type="text" value="{{ $wk->kota }}" name="kota" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Harga</label>
                    <div class="controls">
                        <input type="number" class="span8" type="number" value="{{ $wk->harga }}" name="harga" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Harga SALE</label>
                    <div class="controls">
                        <input type="number" class="span8" type="number" value="{{ $wk->sale }}" name="sale" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Level</label>
                    <div class="controls">
                        <select id="level" name="level" class="span4" required>
                            <option @if($wk->level == 'Dasar') selected
                                    @endif value="Dasar">Dasar
                            </option>
                            <option @if($wk->level == 'Menengah') selected
                                    @endif value="Menengah">Menengah
                            </option>
                            <option @if($wk->level == 'Lanjutan') selected
                                    @endif value="Lanjutan">Lanjutan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Sertifikat</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input @if($wk->certificate == 'YA') checked @endif type="radio"
                                   name="certificate" value="YA" required>
                            Ya
                        </label>
                        <label class="radio inline">
                            <input @if($wk->certificate == 'TIDAK') checked
                                   @endif type="radio" name="certificate" value="TIDAK">
                            Tidak
                        </label>
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label">Deskripsi</label>
                    <div class="controls">
                        <textarea id="summary-ckeditor" name="deskripsi"
                                  required>{{ (is_null($wk->deskripsi)) ? '-' : $wk->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Alat</label>
                    <div class="controls">
                        <textarea id="summary-ckeditor1" name="alat"
                                  required>{{ (is_null($wk->alat)) ? '-' : $wk->alat }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Bahan</label>
                    <div class="controls">
                        <textarea id="summary-ckeditor2" name="bahan"
                                  required>{{ (is_null($wk->bahan)) ? '-' : $wk->bahan }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cara</label>
                    <div class="controls">
                        <textarea id="summary-ckeditor3" name="cara"
                                  required>{{ (is_null($wk->cara)) ? '-' : $wk->cara }}</textarea>
                    </div>
                </div>
                <br><br>
                <div class="control-group">
                    <label class="control-label">Sertifikat</label>
                    <div class="controls">
                        <img src="{{ asset('images/sertif/'.$wk->sertif) }}" width="200px">
                        <input type="file" name="sertif" accept="image/jpeg">
                        <input type="hidden" name="srt" value="{{$wk->sertif}}">
                    </div>
                </div>
                <br><br>
                <div class="control-group">
                    <label class="control-label">Modul PDF</label>
                    <div class="controls">
                        <iframe src="{{ asset('modul/'.$wk->modul) }}#toolbar=0" width="50%" height="250px"></iframe>
                        <input type="file" name="pdf" accept="application/pdf">
                        <input type="hidden" name="modul" value="{{$wk->modul}}">
                    </div>
                </div>
                <br><br>
                <div class="control-group">
                    <label class="control-label">Tampilkan</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input @if($wk->tampil == '1') checked @endif type="radio"
                                   name="tampil" value="1" required>
                            Ya
                        </label>
                        <label class="radio inline">
                            <input @if($wk->tampil == '0') checked @endif type="radio"
                                   name="tampil" value="0">
                            Tidak
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" onclick="gabung()" class="btn btn-success btn-sm"
                                form="editWorkshop_{{ $wk->id }}"> Simpan Update
                        </button>
                    </div>
                </div>
                <br><br>
            </form>
            <hr>
            <div style="iwidth:100%;padding:0px 30px;">
                <h3>Pola</h3>
                <div class="row">
                    @foreach($wk->pola as $pola)
                        <div class="col-md-3">
                            <img src="{{ asset('images/pola/'. $wk->id.'/'.$pola->image) }}" style="object-fit: cover; max-height:125px; width:100%;">
                            <p>{{$pola->teks}}</p>
                            <a style="position:absolute; right:80px; bottom:45px;" data-toggle="modal" data-target="#mudal_{{$pola->id}}"><button class="btn btn-xs btn-default">Edit</button></a>
                            <a style="position:absolute; right:20px; bottom:45px;" href="{{ route('hapusPola', ['id'=>$pola->id]) }}"><button class="btn btn-xs btn-danger">Hapus</button></a>
                        </div>

                        <div id="mudal_{{ $pola->id }}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Pola</h4>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <form action="{{ route('editPola', ['id'=>$pola->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <img src="{{ asset('images/pola/'.$wk->id.'/'.$pola->image) }}" width="150px">
                                            <div class="control-group">
                                                <input name="gbr" type="file" id="thumbnail" accept="image/*">
                                                <input type="hidden" id="thumbnail" name="img" value="{{$pola->image}}">
                                            </div>
                                            <div class="control-group">
                                                <input type="text" value="{{ $pola->teks }}" name="teks">
                                            </div>
                                            <button type="submit">Save</button>
                                        </form>
                                        <!-- footer modal -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <form class="form-horizontal row-fluid" action="{{route('tambahPola', ['id'=>$wk->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
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
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><input type="file" id="gmbr" name="images[]" class="form-control" accept="image/*"/></td>';
                html += '<td><input type="text" id="teks" name="text[]" class="form-control" /></td>';
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
    <script>
        var uploadField = document.getElementById("thumbnail");
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
