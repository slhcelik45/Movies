@extends('admin.template')
@section('content')
    <div style="float:left;margin: 15px 0 15px 0"><a href="{{route('kategoriler.create')}}" class="btn btn-success">Kategori Ekle</a></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Kategori Yönetimi</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th width="2%">Sıra</th>
                    <th width="25%">Adı</th>
                    <th>Açıklama</th>
                    <th width="3%">Aktif Mi ?</th>
                    <th width="12%">Düzenle</th>
                    <th width="2%">Silme</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kategoriler as $i=> $kategori)
                    <tr class="gradeX">
                        <td><span class="badge badge-danger">{{$i+1}}</span></td>
                        <td>{{$kategori->adi}}</td>
                        <td>{{$kategori->aciklama}}</td>
                        <td>
                            @if(($kategori->aktif ==1))
                               <span class="label label-success"> Aktif</span>
                            @else
                                <span class="label label-warning"> Pasif</span>
                            @endif
                        </td>
                        <td class="center">
                            <a href="{{route('kategoriler.edit',$kategori->id)}}" class="btn btn-primary btn-mini">Düzenle</a>
                            <a href="{{route('kategoriler.show',$kategori->id)}}" class="btn btn-success btn-mini">Aktif / Pasif</a>
                        </td>
                        {!! Form::model($kategori,['route'=>['kategoriler.destroy',$kategori->id],'method'=>'DELETE']) !!}
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

