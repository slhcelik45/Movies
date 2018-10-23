@extends('admin.template')
@section('content')
    <div class="widget-box">
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th width="3%">Sıra</th>
                    <th width="5%">Üye Foto</th>
                    <th width="15%">Film Adı</th>
                    <th width="5%">Puan</th>
                    <th>Açıklama</th>
                    <th width="6%">Aktif Mi?</th>
                    <th width="8%">Aktif Mi ?</th>
                    <th width="2%">Silme</th>
                </tr>
                </thead>
                <tbody>
                @foreach($yorum as $i=> $kategori)
                    <tr class="gradeX">
                        <td><span class="badge">{{$i+1}}</span></td>
                        <td><img border="0" width="50" height="30" src="/{{$kategori->Uyeler->avatar}}"></td>
                        <td>{{$kategori->Filmler->adi}}</td>
                        <td>{{$kategori->puan}}</td>
                        <td>{{$kategori->aciklama}}</td>
                        <td>
                            @if(($kategori->aktif ==1))
                                <span class="label label-success"> Aktif</span>
                            @else
                                <span class="label label-warning"> Pasif</span>
                            @endif
                        </td>
                        <td class="center">
                            <a href="{{route('yorumlar.edit',$kategori->id)}}" class="btn btn-success btn-mini">Aktif / Pasif</a>
                        </td>
                        {!! Form::model($kategori,['route'=>['yorumlar.destroy',$kategori->id],'method'=>'DELETE']) !!}
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

