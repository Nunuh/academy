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
            <h2>Mitra</h2>
        </div>
        <div class="module-body">
            <div class="module-body table">
                <table class="table table-message">
                    <thead>
                    <tr class="heading">
                        <td width="30%">
                            Icon
                        </td>
                        <td width="20%">
                            Nama
                        </td>
                        <td width="30%">
                            Link
                        </td>
                        <td width="20%">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Institution::all() as $insti)
                        <tr class="unread">
                            <td>
                                <img class="card-img-top" style="width:150px;"
                                     src="{{ asset('images/insti/'.$insti->gambar) }}" alt="Belum diupdate">
                            </td>
                            <td>
                               <a data-toggle="modal" data-target="#detail_{{$insti->id}}">{{ $insti->namaInstansi }}</a>
                            </td>
                            <td>
                                @if(isset($insti->url))
                                    <a href="{{ $insti->url }}" target="_blank">{{ $insti->url }}</a>
                                @else
                                    <p>Belum diupdate</p>
                                @endif
                            </td>
                            <td class="btn-toolbar">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modalono_{{$insti->id}}">Update</a>
                                <a href="{{ route('hapus.institution', ['id' => ($insti->id)]) }}"
                                   class="btn btn-default">Hapus</a>
                            </td>
                        </tr>
                        <div id="detail_{{$insti->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <h5 class="modal-title">Detail Mitra</h5>
                                        <ul>
                                            <li>
                                                {{$insti->namaInstansi}}
                                            </li>
                                            <li>
                                                {{$insti->telp}}
                                            </li>
                                            <li>
                                                {{$insti->email}}
                                            </li>
                                            <li>
                                                {{$insti->namaPic}}
                                            </li>
                                            <li>
                                                {{$insti->kota}}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modalono_{{$insti->id}}" class="modal fade" role="dialog" style="overflow:auto;">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <h5 class="modal-title">Edit Mitra</h5>
                                        <form id="editMitra_{{$insti->id}}" class="form-horizontal row-fluid"
                                              action="{{ route('tambah.institution', ['id'=> $insti->id]) }}"
                                              method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Icon</label>
                                                <div class="controls">
                                                    <input type="file" name="gambar" accept="image/*" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Background</label>
                                                <div class="controls">
                                                    <input type="file" name="background" accept="image/*" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Link Institusi</label>
                                                <div class="controls">
                                                    <input type="text" name="url" placeholder="URL"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Deskripsi</label>
                                                <div class="controls">
                                                    <textarea name="deskripsi" required></textarea>
                                                </div>
                                            </div>
                                        </form>

                                        <button type="submit" class="btn btn-success btn-sm"
                                                form="editMitra_{{ $insti->id }}">
                                            Update Mitra
                                        </button>
                                    </div>
                                    <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
