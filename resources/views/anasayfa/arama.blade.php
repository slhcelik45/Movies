@extends('anasayfa.template')
@section('content')
    <!-- general -->
    <div class="faq">
        <div class="general_agileits_genres">
            <h4 class="latest-text w3_latest_text">Arama Sonuçları...</h4>
            <div class="container">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                            <div class="w3_agile_featured_movies">
                                @foreach($film as $f)<!--Foreach ile $film ile gelen arama  degerleri parçalayıp listeliyoruz-->
                                    <div class="col-md-2 w3l-movie-gride-agile">
                                        <a href="/filmdetay/{{$f->id}}" class="hvr-shutter-out-horizontal"><img src="/{{$f->afis}}" title="{{$f->adi}}" class="img-responsive" alt=" " />
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
    </div>
@endsection()

@section('css')
@endsection()

@section('js')
@endsection()

