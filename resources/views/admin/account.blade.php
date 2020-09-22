@extends('admin_layout')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div id="modalpassword" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <form action="{{ route('ubahPass.admin') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Password Lama</label>
                            <div class="controls">
                                <input type="password" name="pass_lama" minlength="8" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Password Baru</label>
                            <div class="controls">
                                <input type="password" name="pass_baru" minlength="8" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Konfirmasi Password</label>
                            <div class="controls">
                                <input type="password" name="konfirmasi_pass_baru" minlength="8" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="module">
        <div class="module-body">
            <div class="profile-head media">
                <a class="media-avatar pull-left">
                    <img src="{{ asset('admin_aset/images/user.png') }}" alt="image">
                </a>
                <div class="media-body">
                    <h4>
                        {{ Auth::guard('admin')->user()->name }}
                    </h4>
                    <p class="profile-brief">
                        {{ Auth::guard('admin')->user()->email}}
                    </p>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalpassword">Ganti Password</a>
        <!--/.module-body-->
        <a class="btn btn-primary btn-xs" href="{{ route('admin.regpage') }}">Tambah Admin</a>
        <div class="module-head">
            <div class="module message">
                <div class="module-body table">
                    <table class="table table-message">
                        <thead>
                        <tr class="heading">
                            <td class="cell-author">
                                Nama
                            </td>
                            <td class="cell-author">
                                Email
                            </td>
                            <td class="cell-time">
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Admin::where('id', '!=', Auth::guard('admin')->user()->id)->get() as $ad)
                            <tr class="unread">
                                <td class="cell-author">
                                    {{ $ad ->name }}
                                </td>
                                <td class="cell-author">
                                    {{ $ad->email }}
                                </td>
                                <td class="cell-time">
                                    <a class="btn-default btn-xs"
                                       href="{{ route('hapus.Admin', ['id' => $ad->id]) }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="module-foot">
                </div>
            </div>
        </div>
    </div>
@endsection