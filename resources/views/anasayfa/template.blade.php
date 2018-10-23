<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/admin/img/ers_fav.ico" type="image/x-icon"/>
    <title>{{$ayar->baslik}}</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="{{$ayar->aciklama}}" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="/ui/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/ui/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/ui/css/contactstyle.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/ui/css/faqstyle.css" type="text/css" media="all" />
    <link href="/ui/css/single.css" rel='stylesheet' type='text/css' />
    <link href="/ui/css/medile.css" rel='stylesheet' type='text/css' />
    <!-- banner-slider -->
    <link href="/ui/css/jquery.slidey.min.css" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="/ui/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="/ui/css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="/ui/js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="/ui/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


    @yield('css')
    <script src="/ui/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items : 5,
                itemsDesktop : [640,4],
                itemsDesktopSmall : [414,3]

            });
        });
    </script>
    <!-- //banner-bottom-plugin -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="/ui/js/move-top.js"></script>
    <script type="text/javascript" src="/ui/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="w3layouts_logo">
            <a href="{{route('anasayfa')}}"><h1>Ers<span>Tream</span></h1></a>
        </div>
        <div class="w3_search">
            <form action="{{route('arama.yap')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="kelime" placeholder="Arama Yapınız" required="">
                <button type="submit" class="btn btn-warning">Git</button>
            </form>
        </div>
        <div class="w3l_sign_in_register">
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i>{{$ayar->tel}}</li>
                @if(!Auth::check())
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Giriş</a></li>
                @else
                    <div id="user-nav" class="navbar navbar-inverse">
                        <ul class="nav">
                            <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Merhaba, {{Auth::user()->name}}</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @if(Auth::user()->yetki=='admin')
                                        <li><a href="{{route('yonetim.index')}}"><i class="icon-user"></i> Yönetim Paneli</a></li>
                                    @endif
                                    <li class="divider"></li>
                                    <li><a href="{{route('yonetim.cikis')}}"><i class="icon-key"></i> Çıkış</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
@include('anasayfa.pop-up')<!--giriş ve kayıt site ilk açıldıgında sayfasının tasarımını dahil eder-->
@include('anasayfa.header')<!--header(anasayfa,kategori turler vb..) site ilk açıldıgında sayfasının tasarımını dahil eder-->
@if(request()->route()->getName()=='anasayfa')<!--roure ismi "anasayfa" ise slaydır sayfasının tasarımını dahil eder-->
  @include('anasayfa.slidey')
@endif

  <!--sosyal_medyalar-->
<div class="general_social_icons">
    <nav class="social">
        <ul>
            <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
            <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
            <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
            <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
        </ul>
    </nav>
</div>
<!--//sosyal_medyalar-->
@yield('content')<!--degisen icerik sayfalarını istenildigi zaman tasarımını dahil eder-->

@include('anasayfa.footer')<!--footer(sitelerin en alt kısmı) site ilk açıldıgında sayfasının tasarımını dahil eder-->
<!-- Bootstrap Core JavaScript -->
<script src="/ui/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
@include('sweetalert::alert')

@yield('js')
@yield('script')
<!-- //here ends scrolling icon -->
</body>
</html>