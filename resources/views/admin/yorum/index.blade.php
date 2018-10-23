@extends('admin.template')
@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Yorum Yönetimi</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th width="3%">Sıra</th>
                    <th width="17%">Üyeler</th>
                    <th width="15%">Film Adı</th>
                    <th width="2%">Puan</th>
                    <th width="5%">Aktif Mi?</th>
                    <th>Acıklama</th>
                    <th width="10%"></th>
                    <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($yorumlar as $i=> $yazi)
                    <tr class="gradeX">
                        <td><span class="badge">{{$i+1}}</span></td>
                        <td>{{$yazi->Uyeler->name}}</td>
                        <td>{{$yazi->Filmler->adi}}</td>
                        <td>{{$yazi->puan}}</td>
                        <td>
                            @if($yazi->aktif==1)
                                <span class="label label-success">Aktif</span>
                             @else
                                <span class="label label-warning">Pasif</span>
                             @endif
                        </td>
                        <td>{{$yazi->aciklama}}</td>
                        <td class="center">
                            <a href="{{route('yorumlar.edit',$yazi->id)}}" class="btn btn-warning btn-mini">Aktif & Pasif</a>
                        </td>
                        {!! Form::model($yazi,['route'=>['yorumlar.destroy',$yazi->id],'method'=>'DELETE']) !!}
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

