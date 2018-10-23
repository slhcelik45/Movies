@extends('anasayfa.template')
@section('content')
    <!-- single -->
    <div class="single-page-agile-main">
        <div class="container">
            <div class="single-page-agile-info">
                <!-- /movie-browse-agile -->
                <div class="show-top-grids-w3lagile">
                    <div class="col-sm-8 single-left">
                        <div class="song">
                            <div class="song-info">
                                <h3>{{$film->adi}}</h3>
                            </div>
                            <div class="video-grid-single-page-agileits">
                                <div data-video="dLmKio67pVQ" id="video"> <img src="/{{$film->afis}}" alt="" class="img-responsive" /> </div>
                            </div>
                            <div class="w3-agile-news-text">
                                <p><i class="fa fa-eye"></i> {{$film->getViews()}}  <i class="fa fa-ellipsis-h">  </i>  <i class="fa fa-calendar"></i> {!! date('d-m-y',strtotime($film->created_at))!!}</p>

                            </div>
                            <div class="w3-agile-news-text">
                                <hr>
                            </div>
                            <div class="w3-agile-news-text">
                                <p>{!! $film->aciklama !!}</p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>

                        <div class="all-comments">
                            @if(Auth::check())
                            <div class="all-comments-info">
                                <a href="#">Yorum Yazınız...</a>
                                <div class="agile-info-wthree-box">
                                    <form action="{{route('yorum.gonder')}}" method="POST" >
                                        {{csrf_field()}}
                                        <input hidden="hidden" type="text" name="filmId" value="{{$film->id}}">
                                        <textarea name="aciklama" placeholder="Yorumunuz..." rows="5" cols="150" required=""></textarea>
                                        <button type="submit" class="btn btn-warning btn-block">Gönder</button>
                                        <div class="clearfix"> </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="media-grids">
                                @foreach($yorum as $r)<!--FOreach ile yorumları ile gelen degerleri parçalayıp listeliyoruz-->
                                    <div class="media">
                                    <h5>{{$r->Uyeler->name}}</h5>
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="/{{$r->Uyeler->avatar}}" width="50" height="50" title="One movies" alt=" " />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p>{{$r->aciklama}}</p>
                                        <span>Bütün Mesajlar :<a href="#"> Admin </a></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--En fazla izlenen-->
                    <div class="col-md-4 single-right">
                        <h3>En Fazla Yorum</h3>
                        <div class="single-grid-right">
                            @foreach($yorumlar as $f)<!--FOreach ile Filmlere yapılan yorumları gelen degerleri parçalayıp listeliyoruz-->
                                <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="/filmdetay/{{$f->Filmler->id}}"><img src="/{{$f->Filmler->afis}}" alt="" /></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="/filmdetay/{{$f->Filmler->id}}" class="title"> {{$f->Filmler->adi}}</a>
                                    <p class="author"><a href="#" class="author">{{$f->Uyeler->name}}</a></p>
                                    <p class="views fa fa-calendar">  {!! date('d-m-y',strtotime($f->updated_at))!!}</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            @endforeach
                        </div>
                            <h3>En Fazla Tıklanan</h3>
                            <div class="single-grid-right">
                                @foreach($tiklama as $f)<!--FOreach ile tıklama egeri ile en fazla ziyaraet edilen filmleri  degerleri parçalayıp listeliyoruz-->
                                    <div class="single-right-grids">
                                        <div class="col-md-4 single-right-grid-left">
                                            <a href="/filmdetay/{{$f->id}}"><img src="/{{$f->afis}}" alt="" /></a>
                                        </div>
                                        <div class="col-md-8 single-right-grid-right">
                                            <a href="/filmdetay/{{$f->id}}" class="title"> {{$f->adi}}</a>
                                            <p class="author title"><i class="fa fa-eye ">  {{$f->getViews()}}</i></p>
                                            <p class="views fa fa-calendar">  {!! date('d-m-y',strtotime($f->created_at))!!}</p>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                @endforeach
                            </div>

                    </div>
                    <div class="clearfix"> </div>

                </div>
                <!-- //movie-browse-agile -->
            </div>
            <!-- //w3l-latest-movies-grids -->
        </div>
    </div>
    <!-- //w3l-medile-movies-grids -->
@endsection()

@section('css')
@endsection()

@section('js')
@endsection()

