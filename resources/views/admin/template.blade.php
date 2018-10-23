<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/admin/img/ers_fav.ico" type="image/x-icon"/>
    <title>Erstream Yayıncılık</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="/admin/css/matrix-media.css" />
    <link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/admin/css/jquery.gritter.css" />
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="{{route('yonetim.index')}}"><img src="/admin/img/ers.png" /></a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Merhaba, {{Auth::user()->name}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{route('kullanici.duzenle',Auth::user()->id)}}"><i class="icon-user"></i> Profilim</a></li>
                <li class="divider"></li>
                <li><a href="{{route('yonetim.cikis')}}"><i class="icon-key"></i> Çıkış</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('yonetim.index')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{route('yonetim.index')}}"><i class="icon icon-home"></i> <span>Yönetim Paneli</span></a> </li>
        <li> <a href="{{route('ayarlar.index')}}"><i class="icon icon-cogs"></i> <span>Site Ayarları</span></a> </li>
        <li> <a href="{{route('kategoriler.index')}}"><i class="icon icon-align-justify"></i> <span>Kategoti Yönetimi</span></a> </li>
        <li> <a href="{{route('turler.index')}}"><i class="icon icon-align-justify"></i> <span>Türler Yönetimi</span></a> </li>
        <li> <a href="{{route('filmler.index')}}"><i class="icon icon-facetime-video"></i> <span>Film Yönetimi</span></a> </li>
        <li> <a href="{{route('kullanici.index')}}"><i class="icon icon-user-md"></i> <span>Kullanıcı Yönetimi</span></a> </li>
        <li> <a href="{{route('yorumlar.index')}}"><i class="icon icon-comment"></i> <span>Yorum Yönetimi</span></a> </li>


    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        @yield('content')
        <!--End-Action boxes-->
    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Erstream Yayıncılık <a target="_blank" href="https://www.erstream.com/">Erstream</a> </div>
</div>

<!--end-Footer-part-->

<script src="/admin/js/excanvas.min.js"></script>
<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/jquery.ui.custom.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/jquery.flot.min.js"></script>
<script src="/admin/js/jquery.flot.resize.min.js"></script>
<script src="/admin/js/jquery.peity.min.js"></script>
<script src="/admin/js/fullcalendar.min.js"></script>
<script src="/admin/js/matrix.js"></script>
<script src="/admin/js/matrix.dashboard.js"></script>
<script src="/admin/js/jquery.gritter.min.js"></script>
<script src="/admin/js/matrix.interface.js"></script>
<script src="/admin/js/matrix.chat.js"></script>
<script src="/admin/js/jquery.validate.js"></script>
<script src="/admin/js/matrix.form_validation.js"></script>
<script src="/admin/js/jquery.wizard.js"></script>
<script src="/admin/js/jquery.uniform.js"></script>
<script src="/admin/js/select2.min.js"></script>
<script src="/admin/js/matrix.popover.js"></script>
<script src="/admin/js/jquery.dataTables.min.js"></script>
<script src="/admin/js/matrix.tables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
@include('sweetalert::alert')
@yield('js')

</body>
</html>
