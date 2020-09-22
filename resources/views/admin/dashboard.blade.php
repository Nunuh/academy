@extends('admin_layout')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="btn-controls">
        <div class="btn-box-row row-fluid">
            <a href="{{ route('verification.admin') }}" class="btn-box big span4"><i class=" icon-group"></i><b>{{ $subs }}</b>
                <p class="text-muted">
                    Belum Diverifikasi</p>
            </a><a href="{{ route('client.admin') }}" class="btn-box big span4"><i
                    class="icon-user"></i><b>{{ $user }}</b>
                <p class="text-muted">
                    User Terdaftar</p>
            </a><a href="{{ route('transaksi.admin') }}" class="btn-box big span4"><i class="icon-money"></i><b>{{ $trans }}</b>
                <p class="text-muted">Transaksi yang belum lunas</p>
            </a>
        </div>
    </div>
    <div class="module message">
        <div class="module-head">
            <h3><strong>WORKSHOP</strong></h3>
        </div>
        <div class="module-body">
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="20%">
                            Judul
                        </td>
                        <td width="15%">
                            Kode
                        </td>
                        <td width="15%">
                            Harga
                        </td>

                        <td width="25%">
                            Gambar
                        </td>
                        <td width="10%">
                            Peserta
                        </td>
                        <td width="15%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($works as $wk)
                        <tr class="unread">
                            <td>
                                {{ $wk->judul }}
                            </td>
                            <td>
                                {{ $wk->kode}}
                            </td>
                            <td>
                                {{ $wk->harga }}
                            </td>
                            <td>
                                <img width="50" src="{{ asset('images/workshop/'.$wk->image) }}" alt="image" data-toggle="modal" data-target="#modal2{{$wk->id}}">

                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#modalu_{{$wk->id}}">{{ $wk->user->count() }}</a>
                            </td>
                            <td class="btn-toolbar">
                                <a class="btn btn-primary btn-xs accordion-toggle" href="{{ route('workshop-detail.admin', ['id' => $wk->id ]) }}">Edit
                                </a>
                                <a class="btn btn-default btn-xs"
                                   href="{{ route('hapusworkshop.admin', ['id' => $wk->id]) }}">Hapus</a>
                            </td>
                        </tr>
                        <div id="modal2{{$wk->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <img width="100%" src="{{ asset('images/workshop/'.$wk->image) }}" alt="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modalu_{{ $wk->id }}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Peserta Workshop</h4>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <ul>
                                            @foreach(\App\Workshop::find($wk->id)->user as $work)
                                                <li>
                                                    {{ $work ->  email }}
                                                </li>
                                            @endforeach
                                        </ul>
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
                    </tbody>
                </table>
            </div>
            {{ $works -> appends(['courses' => $courses -> currentPage()]) ->links() }}
        </div>
    </div>

    <div class="module message">
        <div class="module-head">
            <h3><strong>COURSE</strong></h3>
        </div>
        <div class="module-body">
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="20%">
                            Judul
                        </td>
                        <td width="5%">
                            Kode
                        </td>
                        <td width="15%">
                            Harga Kursus
                        </td>
                        <td width="25%">
                            Video
                        </td>
                        <td width="5%">
                            Peserta
                        </td>
                        <td width="20%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr class="unread">
                            <td>
                                {{ $course->judul }}
                            </td>
                            <td>
                                {{ $course->kode }}
                            </td>

                            <td>
                                {{ $course->harga }}
                            </td>

                            <td>
                                <a href="{{ $course->video }}" target="_blank">{{ $course->video }}</a>
                            </td>

                            <td>
                                <a data-toggle="modal" data-target="#modalo_{{ $course->id }}">{{ $course->user->count() }}</a>
                            </td>

                            <td class="btn-toolbar">
                                <a class="btn btn-primary btn-xs" data-toggle="modal"
                                   data-target="#modali_{{ $course->id }}">Edit
                                </a>
                                <a class="btn btn-default btn-xs"
                                   href="{{ route('hapuscourse.admin', ['id' => $course->id]) }}">Hapus</a>
                            </td>
                        </tr>

                        <div id="modalo_{{ $course->id }}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Peserta Kursus</h4>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <ul>
                                            @foreach(\App\Course::find($course->id)->user as $co)
                                                <li>
                                                    {{ $co ->  email }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- footer modal -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="modali_{{ $course->id }}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="submit" onclick="join()" class="btn btn-success btn-sm"
                                                form="editCourse{{ $course->id }}">Simpan Update
                                        </button>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <h4 class="modal-title">Edit Course</h4>


                                    </div>
                                    <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $courses -> appends(['works' => $works -> currentPage()])->links() }}
        </div>
    </div>
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
