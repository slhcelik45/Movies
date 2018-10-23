@extends('admin.template')
@section('content')
    <div style="float:left;margin: 15px 0 15px 0"><a href="{{route('filmler.create')}}" class="btn btn-success">Film Ekle</a></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>İçerik Yönetimi</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th width="3%">Sıra</th>
                    <th width="10%">Afiş</th>
                    <th width="4%">IDM ?</th>
                    <th>Kategori</th>
                    <th>Tür</th>
                    <th>Yıl</th>
                    <th>Çeşit</th>
                    <th>Adı</th>
                    <th>Slaydır Mı?</th>
                    <th width="10%">Düzenleme</th>
                    <th width="2%">Silme</th>
                </tr>
                </thead>
                <tbody>
                @foreach($film as $i=> $r)
                    <tr class="gradeX">
                        <td><span class="badge">{{$i+1}}</span></td>
                        <td><img border="0" width="80" height="40" src="/{{$r->afis}}"></td>
                        <td>{{$r->idmPuan}}</td>
                        <td>{{$r->Kategori->adi}}</td>
                        <td>{{$r->Tur->adi}}</td>
                        <td>{{$r->yil}}</td>
                        <td>{{$r->cesit}}</td>
                        <td>{{$r->adi}}</td>
                        <td>
                            @if( $r->slaydir==1)
                                    <span class="label label-success"> EVET</span>
                             @else
                                    <span class="label label-warning">HAYIR</span>
                             @endif
                        </td>
                        <td class="center">
                            <a href="{{route('filmler.edit',$r->id)}}" class="btn btn-primary btn-mini">Düzenle</a>
                            <a href="{{route('filmler.show',$r->id)}}" class="btn btn-warning btn-mini">Slaydır</a>
                        </td>
                        {!! Form::model($r,['route'=>['filmler.destroy',$r->id],'method'=>'DELETE']) !!}
                        <td class="center">
                            <button type="submit" class="btn btn-danger btn-mini">Sil</button>
                        </td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection()

@section('css')
    <link rel="stylesheet" href="/admin/css/uniform.css" />
    <link rel="stylesheet" href="/admin/css/select2.css" />
@endsection()

@section('js')
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/jquery.ui.custom.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/jquery.uniform.js"></script>
    <script src="/admin/js/select2.min.js"></script>
    <script src="/admin/js/jquery.dataTables.min.js"></script>
    <script src="/admin/js/matrix.js"></script>
    <script src="/admin/js/matrix.tables.js"></script>
@endsection()

