<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link type="text/css" href="{{ asset('admin_aset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin_aset/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('admin_aset/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admin_aset/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="#">Admin Jahitin </a>

            <div class="collapse navbar-collapse">

                <ul class="nav pull-right">
                    @if(Auth::guard('admin')->check())
                        <li class="nav-link dropdown"><a class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::guard('admin')->user()->name }}
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('account.admin') }}">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="{{ route('dashboard.admin') }}"><i
                                    class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                        <li><a href="{{ route('course.admin') }}"><i class="menu-icon icon-bullhorn"></i>Course</a>
                        </li>
                        <li><a href="{{ route('workshop.admin') }}"><i class="menu-icon icon-tasks"></i>Workshop</a>
                        </li>
{{--                        <li><a href="#"><i class="menu-icon icon-inbox"></i>Artikel</a></li>--}}
                        <li><a href="{{ route('transaksi.admin') }}"><i
                                    class="menu-icon icon-bell-alt"></i>Transaksi</a></li>
                        <li><a href="{{ route('verification.admin') }}"><i class="menu-icon icon-inbox"></i>Verifikasi</a>
                        </li>
                        <li><a href="{{ route('dokPage') }}"><i class="menu-icon icon-adjust"></i>Dokumentasi</a>
                        </li>
                        <li><a href="{{ route('institution.admin') }}"><i
                                    class="menu-icon icon-globe"></i>Mitra</a></li>
                        <li><a href="{{ route('kategori.admin') }}"><i
                                    class="menu-icon icon-certificate"></i>Kategori</a></li>
                        <li><a href="{{ route('partner.admin') }}"><i class="menu-icon icon-asterisk"></i>Partner</a>
                        </li>
                        <li><a href="{{ route('galeri') }}"><i class="menu-icon icon-phone"></i>Galeri</a></li>
                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i
                                    class="menu-icon icon-cog"></i><i class="icon-chevron-down pull-right"></i><i
                                    class="icon-chevron-up pull-right"></i>Client </a>
                            <ul id="togglePages" class="collapse unstyled">
                                <li><a href="{{ route('client.admin') }}"><i class="icon-inbox"></i>All Users </a></li>
                                <li><a href="{{ route('subs.admin') }}"><i class="icon-inbox"></i>Subscriber</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/.span3-->
            <div class="col-md-9">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <p class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a> Jahitin Academy</a>
        </p>
    </div>
</div>

</body>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor');
</script>
<script>
    CKEDITOR.replace('summary-ckeditor1');
</script>
<script>
    CKEDITOR.replace('summary-ckeditor2');
</script>
<script>
    CKEDITOR.replace('summary-ckeditor3');
</script>
<script>
    CKEDITOR.replace('summary-ckeditor4');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>
