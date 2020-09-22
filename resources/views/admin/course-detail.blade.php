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
            <h3>Course Detail- Jahitin.com</h3>
        </div>
        
        @foreach($courses as $course)
        <div class="module-body">
            <form action="{{ route('editcourse.admin', ['id' => $course->id]) }}" method="post"  enctype="multipart/form-data" id="editCourse{{ $course->id }}">
                @csrf
                <div class="control-group">
                    <label>Image</label>

                    <div class="controls">
                        <img src="{{ asset('images/course/'.$course->thumbnail) }}"
                                width="150px">
                        <input name="gambar" type="file" id="thumbnail" accept="image/*">
                        <input type="hidden" name="thumbnail"
                                value="{{ $course->thumbnail }}" >
                    </div>
                </div>
                <div class="control-group">
                    <label>Link Video</label>
                    <div class="controls">
                        <input class="span4" type="text"
                                value="{{ $course->video }}"
                                name="video" required>
                    </div>
                </div>
                <div class="control-group">
                    <label>Kode</label>
                    <div class="controls">
                        <input type="text"
                                value="{{ $course->kode }}"
                                name="kode" required>
                    </div>
                </div>
                <div class="control-group">
                    <label>Judul</label>
                    <div class="controls">
                        <input type="text"
                                value="{{ $course->judul }}"
                                name="judul" required>
                    </div>
                </div>
                <div class="control-group">
                    <label>URL</label>
                    <div class="controls">
                        <input type="text"
                                value="{{ $course->url }}"
                                name="url" required>
                    </div>
                </div>
                <div class="control-group">
                    <label>Subject</label>
                    <div class="controls">
                        <input type="text"
                                value="{{ $course->subject }}"
                                name="subject" required>
                    </div>
                </div>

                <div class="control-group">
                    <label>Tanggal Mulai</label>
                    <div class="controls">
                        <input type="date"
                                value="{{ $course->start_tgl }}"
                                name="start_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label>Tanggal Berakhir</label>
                    <div class="controls">
                        <input type="date"
                                value="{{ $course->end_tgl }}"
                                name="end_tgl" required>
                    </div>
                </div>

                <div class="control-group">
                    <label>Institution</label>
                    <div class="controls">
                        <select name="institution_id" class="span4" required>
                            @foreach( \App\Institution::all() as $ins)
                                <option @if($course->institution_id == $ins->id) selected
                                        @endif value="{{ $ins->id }}">{{ $ins->namaInstansi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label>Kategori</label>
                    <div class="controls">
                        <select name="kategori_id" class="span4" required>
                            @foreach( \App\Kategori::all() as $kategori)
                                <option @if($course->kategori_id == $kategori->id) selected
                                        @endif value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label>Durasi</label>
                    <div class="controls">
                        <div class="input-append input-group-append">
                            <?php $dur = explode(' ', $course->durasi)?>
                            <input class="span2" id="menit" value="{{ $dur[0] }}"
                                    required><span
                                class="add-on">Menit</span>
                            <input class="span2" id="detik" value="{{ $dur[2] }}"
                                    required><span
                                class="add-on">Detik</span>
                            <input type="hidden" value="{{ $course->durasi }}" id="durasi"
                                    name="durasi">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label>Harga</label>
                    <div class="controls">
                        <input type="number"
                                value="{{ $course->harga }}"
                                name="harga" required>
                    </div>
                </div>
                <div class="control-group">
                    <label>Harga SALE</label>
                    <div class="controls">
                        <input type="number"
                                value="{{ $course->sale }}"
                                name="sale" required>
                    </div>
                </div>
                <div class="control-group">
                    <label>Level</label>
                    <div class="controls">
                        <select name="level" class="span4" required>
                            <option @if($course->level == 'Dasar') selected
                                    @endif value="Dasar">Dasar
                            </option>
                            <option @if($course->level == 'Menengah') selected
                                    @endif value="Menengah">Menengah
                            </option>
                            <option @if($course->level == 'Lanjutan') selected
                                    @endif value="Lanjutan">Lanjutan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Language</label>
                    <div class="controls">
                        <select name="language" class="span4" required>
                            <option @if($course->language == 'Indonesia') selected
                                    @endif value="Indonesia">Indonesia
                            </option>
                            <option @if($course->language == 'English') selected
                                    @endif value="English">English
                            </option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Subtitle</label>
                    <div class="controls">
                        <select name="subtitle" class="span4" required>
                            <option @if($course->subtitle == 'Indonesia') selected
                                    @endif value="Indonesia">Indonesia
                            </option>
                            <option @if($course->subtitle == 'English') selected
                                    @endif value="English">English
                            </option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Certificate</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input @if($course->certificate == 'YA') checked
                                    @endif name="certificate" type="radio" value="YA"
                                    required>
                            YA
                        </label>
                        <label class="radio inline">
                            <input @if($course->certificate == 'TIDAK') checked
                                    @endif name="certificate" type="radio" value="TIDAK">
                            TIDAK
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Quizzes</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input @if($course->quizzes == 'YA') checked
                                    @endif name="quizzes" type="radio" value="YA" required>
                            YA
                        </label>
                        <label class="radio inline">
                            <input @if($course->quizzes == 'TIDAK') checked
                                    @endif name="quizzes" type="radio" value="TIDAK">
                            TIDAK
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Syllabus</label>
                    <div class="controls">
                            <textarea class="form-control" id="summary-ckeditor2" name="syllabus"
                                        required>{{ (is_null($course->syllabus)) ? '_' : $course->syllabus }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label>Deskripsi</label>
                    <div class="controls">
                        <textarea name="deskripsi"  class="form-control" id="summary-ckeditor3" required>{{ (is_null($course->deskripsi)) ? '-' : $course->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label>Alat</label>
                    <div class="controls">
                        <textarea name="alat"  class="form-control" id="summary-ckeditor3" required>{{ (is_null($course->alat)) ? '-' : $course->alat }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label>Bahan</label>
                    <div class="controls">
                        <textarea name="bahan"  class="form-control" id="summary-ckeditor3" required>{{ (is_null($course->bahan)) ? '-' : $course->bahan }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label>Cara</label>
                    <div class="controls">
                        <textarea name="cara"  class="form-control" id="summary-ckeditor3" required>{{ (is_null($course->cara)) ? '-' : $course->cara }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label>Tampilkan</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input @if($course->tampil == '1') checked @endif type="radio"
                                    name="tampil" value="1" required>
                            YA
                        </label>
                        <label class="radio inline">
                            <input @if($course->tampil == '0') checked @endif type="radio"
                                    name="tampil" value="0">
                            Tidak
                        </label>
                    </div>
                </div>
                <button type="submit" onclick="join()" class="btn btn-success btn-sm" form="editCourse{{ $course->id }}">Simpan Update </button>
            </form>
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
    <script>
    $(document).ready(function(){

    var count = 1;

    dynamic_field(count);

    function dynamic_field(number)
    {
    html = '<tr>';
        html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
        html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
    }

    $(document).on('click', '#add', function(){
    count++;
    dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
    count--;
    $(this).closest("tr").remove();
    });

    });
    </script>
@endsection
