@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5> Kategori Düzenleme :{{$kategori->baslik}}</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($kategori,['route'=>['kategoriler.update',$kategori->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Adı :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="adi" value="{{$kategori->adi}}"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <textarea class="span11" name="aciklama" rows="4" cols="50" >{{$kategori->aciklama}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Güncelle</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection()

@section('css')
@endsection()

@section('js')
@endsection()




