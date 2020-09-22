<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link type="text/css" href="{{ asset('admin_aset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin_aset/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin_aset/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin_aset/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
</head>
<body>

@if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('message') }}
    </div>
@endif

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand">
                Admin
            </a>

{{--            <div class="nav-collapse collapse navbar-inverse-collapse">--}}
{{--                <ul class="nav pull-right">--}}

{{--                    <li><a href="{{ route('admin.regpage') }}">--}}
{{--                            Sign Up--}}
{{--                        </a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->


<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset4">
                <form class="form-vertical" action="{{ route('admin.loginPost') }}" method="POST">
                   @csrf
                    <div class="module-head">
                        <h3>Sign In</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input id="email" type="email"
                                       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required>
                                <br>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input id="password" type="password"
                                       class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                                {{--@if (Route::has('password.request'))--}}
                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                {{--{{ __('Forgot Your Password?') }}--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--<label class="checkbox">--}}
                                {{--<input type="checkbox"> Remember me--}}
                                {{--</label>--}}
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div><!--/.wrapper-->

<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2020 Jahitin - academy.jahitin.com </b> All rights reserved.
    </div>
</div>
<script src="{{ asset('admin_aset/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_aset/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_aset/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
