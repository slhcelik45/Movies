<!-- nav -->
<div class="movies_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategoriler <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            @foreach($kategoriler as $kategori)<!--kategori degerlerini gösteriyoruz.-->
                                                <li><a href="/kategori/{{$kategori->id}}">{{$kategori->adi}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Türler <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            @foreach($turler as $tur)<!--Tur degerlerini gösteriyoruz.-->
                                                <li><a href="/tur/{{$tur->id}}">{{$tur->adi}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/filmler/1">Filmler</a></li>
                        <li><a href="/diziler/2">Diziler</a></li>
                        <li><a href="/fragmanlar/3">Fragmanlar</a></li>
                        <li><a href="/hakkimizda">Hakkımızda</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>
<!-- //nav -->