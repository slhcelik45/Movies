@extends('anasayfa.template')
@section('content')
    <!-- contact -->
    <div class="contact-agile">
        <div id="map"></div>
        <div class="faq">
            <h4 class="latest-text w3_latest_text">Bizimle İletişime Geçin</h4>
            <div class="container">
                <div class="col-md-3 location-agileinfo">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    </div>
                    <h3>Adresler</h3>
                    <h4>{{$ayar->adres}}</h4><!--Şirketin adreslerini gösteriyoruz.-->
                    <h4>156 Boulevard Vitosha 1111 Sofya-Bulgaristan</h4>
                </div>
                <div class="col-md-3 call-agileits">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                    </div>
                    <h3>Telefon</h3>
                    <h4>{{$ayar->tel}}</h4><!--Şirketin telefonlarını  gösteriyoruz.-->
                    <h4>+359 2 996 4280</h4>
                </div>
                <div class="col-md-3 mail-wthree">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    </div>
                    <h3>E-Mail</h3>
                    <h4><a href="#">{{$ayar->email}}</a></h4><!--Şirketin email adresimi gösteriyoruz.-->
                </div>
                <div class="col-md-3 social-w3l">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </div>
                    <h3>Sosyal media</h3>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
                        <li class="twt"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
                        <li class="ggp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <form action="#" method="post">
                    <input type="text" name="your name" placeholder="Adınız" required="">
                    <input type="text" name="your name" placeholder="Soyadınız" required="">
                    <input type="text" name="your email" placeholder="E-mail" required="">
                    <input type="text" name="subject" placeholder="Başlık" required="">
                    <textarea  name="your message" placeholder="Mesajınız" required=""></textarea>
                    <input type="submit" value="Gönder">
                </form>
            </div>
        </div>
    </div>
    <!-- Map-JavaScript -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng( 41.038616, 28.930023),<!--Şİrketin istanbul enlem ve boylam degerlerine göre haritada yerini gösteriyoruz-->
                styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(41.038616, 28.930023),<!--Şİrketin istanbul enlem ve boylam degerlerine göre haritada yerini gösteriyoruz-->
                map: map,
            });
        }
    </script>
    <!-- //Map-JavaScript -->
    <!-- //contact -->

@endsection()

@section('css')
@endsection()

@section('js')
@endsection()

