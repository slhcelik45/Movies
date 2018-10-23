@extends('admin.template')
@section('content')
    <div style="float:left;margin: 15px 0 15px 0"><a href="{{route('kullanici.ekle')}}" class="btn btn-success">Kullanıcı Ekle</a></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Kullanıcı Yönetimi</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th width="3%">#</th>
                    <th>Kullanıcı İsmi</th>
                    <th>Kullanıcı E-mail</th>
                    <th>Yetki Türü</th>
                    <th width="10%">Avatar</th>
                    <th width="13%">Düzenle</th>
                    <th width="4%">Silme</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kullanicilar as $kullanici)
                    <tr class="gradeX">
                        <td>{{$kullanici->id}}</td>
                        <td>{{$kullanici->name}}</td>
                        <td>{{$kullanici->email}}</td>
                        <td>
                            @if($kullanici->yetki=='admin')
                                Admin
                            @else
                                Standart Kullanıcı
                            @endif
                        </td>
                        <td>
                            <img border="0" width="50" height="50" src="/{{$kullanici->avatar}}">
                        </td>
                        <td class="center">
                            <a href="{{route('kullanici.duzenle',$kullanici->id)}}" class="btn btn-primary btn-mini">Düzenle</a>
                            <a href="{{route('kullanici.aktif',$kullanici->id)}}" class="btn btn-warning btn-mini">Aktif & Pasif</a>
                        </td>
                        <form action="{{route('kullanici.sil',$kullanici->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <td class="center">
                                <button type="submit" class="btn btn-danger btn-mini">Sil</button>
                            </td>
                        </form>
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

