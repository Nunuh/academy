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
            <h3>Konfirmasi Course - Jahitin.com</h3>
        </div>
        <br>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="{{ route('validasi.course') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="basicinput">Daftar Kursus</label>
                    <div class="controls">
                        <select id="kursus" name="kursus" class="span6" required>
                            <option value="">== Pilih Judul Kursus ==</option>
                            @foreach( \App\Course::all() as $course)
                                <option value="{{ $course->id }}">{{ $course->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Email User</label>
                    <div class="controls">
                        <select id="email" name="email" class="span4" required>
                            <option value="">== Pilih User ==</option>
                            @foreach( \App\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

@endsection
