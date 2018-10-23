<?php

namespace App\Http\Controllers;

use App\Filmler;
use App\Kategoriler;
use App\Turler;
use Illuminate\Http\Request;

class FilmlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film=Filmler::all();

        return view('admin.film.index',compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=Kategoriler::all();
        $tur=Turler::all();

        return view('admin.film.create',compact('kategori','tur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//dd($request);
        $film=new Filmler();

        $film->kategoriId=request('kategoriId');
        $film->turId=request('turId');
        $film->cesit=request('cesit');
        $film->adi=request('adi');
        $film->yil=request('yil');
        $film->idmPuan=request('idmPuan');
        $film->aciklama=request('aciklama');

        $foto=request()->file('afis');
        $dosya_adi=time().'.'.$foto->extension();

        if ($foto->isValid())
        {
            $hedef_klasor='uploads/dosyalar/';
            $dosya_yolu=$hedef_klasor.'/'.$dosya_adi;
            $foto->move($hedef_klasor,$dosya_adi);
            $film->afis=$dosya_yolu;
        }

        $film->save();

        if ($film)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('filmler.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kaydetme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {//Slaydır yapma kısmı
        $film=Filmler::find($id);

        if ($film->slaydir==0){
            $film->slaydir=1;
        }
        else{
            $film->slaydir=0;
        }
        $film->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori=Kategoriler::all();
        $tur=Turler::all();
        $filmler=Filmler::find($id);

        return view('admin.film.edit',compact('kategori','tur','filmler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $film=Filmler::find($id);

        $film->kategoriId=request('kategoriId');
        $film->turId=request('turId');
        $film->cesit=request('cesit');
        $film->adi=request('adi');
        $film->yil=request('yil');
        $film->idmPuan=request('idmPuan');
        $film->aciklama=request('aciklama');

        $foto=request()->file('afis');
        $dosya_adi=time().'.'.$foto->extension();

        if ($foto->isValid())
        {
            $hedef_klasor='uploads/dosyalar/';
            $dosya_yolu=$hedef_klasor.'/'.$dosya_adi;
            $foto->move($hedef_klasor,$dosya_adi);
            $film->afis=$dosya_yolu;
        }

        $film->save();

        if ($film)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('filmler.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Düzenleme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filmler::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(2000);
        return redirect()->route('filmler.index');
    }
}
