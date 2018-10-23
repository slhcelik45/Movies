@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Kullanıcı Düzenle :{{$kullanici->name}}</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" action="{{ route('kullanici.guncelle',$kullanici->id) }}" aria-label="{{ __('Register') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <label class="control-label">Yetki :</label>
                            <div class="controls">
                                <select name="yetki" class="span11" >
                                    @if($kullanici->yetki==1)
                                        <option value="admin" selected >Admin</option>
                                        <option value="" >Standart Kullanıcı</option>
                                    @else
                                        <option value="" selected >Standart Kullanıcı</option>
                                        <option value="admin"  >Admin</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Kullanıcı İsmi :</label>
                            <div class="controls">
                                <input id="name" type="text" class="span11" name="name" value="{{$kullanici->name}}" required >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">E mail :</label>
                            <div class="controls">
                                <input id="email" type="email" class="span11" name="email" value="{{$kullanici->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Yeni Şifre :</label>
                            <div class="controls">
                                <input id="password" type="password" class="span11" name="password" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Yeni Şifre Tekrarla :</label>
                            <div class="controls">
                                <input id="password-confirm" type="password" class="span11" name="password_confirmation" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Avatar :</label>
                            <div class="controls">
                                <input  type="file" class="span11" name="avatar" >
                            </div>
                            <div>
                                <img border="0" width="50" height="50" src="/{{$kullanici->avatar}}"
                                style="float: left;margin: 10px 50px 50px 200px;"
                                >
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-info">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()

@section('css')
@endsection()

@section('js')
@endsection()




