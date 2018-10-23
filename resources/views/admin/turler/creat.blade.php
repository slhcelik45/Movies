@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yeni Tür Ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>'turler.store','method'=>'POST','class'=>'form-horizontal']) !!}
                    <div class="control-group">
                        <label class="control-label">Adı :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="adi"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <textarea class="span11" rows="4" cols="50" name="aciklama"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Kaydet</button>
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




