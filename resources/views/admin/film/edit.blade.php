@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5> Film Düzenle :{{$filmler->adi}}</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($filmler,['route'=>['filmler.update',$filmler->id],'method'=>'PUT','class'=>'form-horizontal','files'=>'true']) !!}
                    <div class="control-group">
                        <label class="control-label"> Kategoriler </label>
                        <div class="controls">
                            <select required name="kategoriId" class="span4" >
                                <option value="{{$filmler->kategoriId}}" selected >{{$filmler->Kategori->adi}}</option>
                                @foreach($kategori as $r)
                                    <option value="{{$r->id}}">{{$r->adi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Türler </label>
                        <div class="controls">
                            <select required name="turId" class="span4" >
                                <option value="{{$filmler->turId}}" selected >{{$filmler->Tur->adi}}</option>
                                @foreach($tur as $r)
                                    <option value="{{$r->id}}">{{$r->adi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Çeşit</label>
                        <div class="controls">
                            <select required name="cesit" class="span4">
                                <option value="{{$filmler->cesit}}" selected>{{$filmler->cesit}}</option>
                                <option value="1" >Film</option>
                                <option value="2" >Dizi</option>
                                <option value="3" >Fragman</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Yıl</label>
                        <div class="controls">
                            <input required value="{{$filmler->yil}}" class="span4" type="number" min="1990" max="3000" step="1" name="yil">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">IDM</label>
                        <div class="controls">
                            <input required value="{{$filmler->idmPuan}}" class="span4" type="number" min="0" max="10" step="0.1" name="idmPuan">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Adı</label>
                        <div class="controls">
                            <input required value="{{$filmler->adi}}" class="span4" type="text" name="adi">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Acıklama</label>
                        <div class="controls">
                            <textarea class="span4" rows="10" cols="20" name="aciklama">{{$filmler->aciklama}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Video</label>
                        <div class="controls">
                            <textarea class="span4" rows="10" cols="20" name="video">{{$filmler->video}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Resim </label>
                        <div class="controls">
                            <input type="file" name="afis" class="span11" />
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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection()




