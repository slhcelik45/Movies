<!-- banner -->

<div id="slidey" style="display:none;">
    <ul>
        @foreach($slider as $r)<!--Slider olarak gelin filmleri  gösteriyoruz.-->
        <li>
            <a href="/filmler/{{$r->id}}">
                <img src="/{{$r->afis}}" alt=" "><p class='title'>{{$r->adi}}</p><p class='description'> {{$r->aciklama}}</p>
            </a>
        </li>
        @endforeach
    </ul>
</div>
<script src="/ui/js/jquery.slidey.js"></script>
<script src="/ui/js/jquery.dotdotdot.min.js"></script>
<script type="text/javascript">
    $("#slidey").slidey({
        interval: 8000,
        listCount: 5,
        autoplay: false,
        showList: true
    });
    $(".slidey-list-description").dotdotdot();
</script>
<!-- //banner -->