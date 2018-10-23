@extends('anasayfa.template')
@section('content')
    <!-- general -->
    <div class="general">
        <h4 class="latest-text w3_latest_text">Filmler</h4>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Öne Çıkanlar</a></li>
                    <li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">IDM</a></li>
                    <li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">En Son Eklenenler</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">
                            @foreach($yorum as $f)<!--En fazla yorum puanı olan  filmleri  gösteriyoruz.-->
                                <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="/filmdetay/{{$f->id}}" class="hvr-shutter-out-horizontal"><img src="/{{$f->Filmler->afis}}" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="/filmdetay/{{$f->id}}">{{$f->Filmler->adi}}</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>{{$f->Filmler->yil}}</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="rating" aria-labelledby="rating-tab">
                        @foreach($idmFilm as $f)<!--En yüksek IDM puanlı filmleri  gösteriyoruz.-->
                            <div class="col-md-2 w3l-movie-gride-agile">
                            <a href="/filmdetay/{{$f->id}}" class="hvr-shutter-out-horizontal"><img src="/{{$f->afis}}" title="album-name" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="/filmdetay/{{$f->id}}">{{$f->adi}}</a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>{{$f->yil}}</p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="imdb" aria-labelledby="imdb-tab">
                        @foreach($sonFilm as $f)<!--En son eklenan filmleri  gösteriyoruz.-->
                            <div class="col-md-2 w3l-movie-gride-agile">
                            <a href="/filmdetay/{{$f->id}}" class="hvr-shutter-out-horizontal"><img src="/{{$f->afis}}" title="album-name" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="/filmdetay/{{$f->id}}">{{$f->adi}}</a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>{{$f->yil}}</p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben">
                                <p>NEW</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //general -->
    <!-- general -->
    <div class="general">
        <h4 class="latest-text w3_latest_text">En Son izlenen Filmler</h4>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">
                            @foreach($tiklama as $f)<!--En fazla ziyaret edilen filmleri  gösteriyoruz.-->
                                <div class="col-md-2 w3l-movie-gride-agile">
                                    <a href="/filmdetay/{{$f->id}}" class="hvr-shutter-out-horizontal"><img src="/{{$f->afis}}" title="album-name" class="img-responsive" alt=" " />
                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_w3layouts_mid_1_home">
                                        <div class="w3l-movie-text">
                                            <h6><a href=/filmdetay/{{$f->id}}">{{$f->adi}}</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>{{$f->yil}}</p>
                                            <div class="block-stars">
                                                <ul class="w3l-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- //general -->

@endsection()

@section('css')
@endsection()

@section('js')
@endsection()

