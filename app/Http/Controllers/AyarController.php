<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AyarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayarlar=Ayarlar::find(1)->first();
        return view('admin.ayarlar.create',compact('ayarlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $ayar=Ayarlar::find(1);
        $ayar->baslik=request('baslik');
        $ayar->aciklama=request('aciklama');
        $ayar->email=request('email');
        $ayar->facebook=request('facebook');
        $ayar->twitter=request('twitter');
        $ayar->instagram=request('instagram');
        $ayar->hakkimizda=request('hakkimizda');
        $ayar->adres=request('adres');
        $ayar->tel=request('tel');

        if (request()->hasFile('logo'))
        {
            $this->validate(request(),array('logo'=>'image|mimes:png,jpg,jpeg,gif|max:2048'));

        }

        $resim=request()->file('logo');
        $dosya_adi='logo'.'-'.time().'.'.$resim->extension();

        if ($resim->isValid())
        {
            $hedef_klasor='uploads/dosyalar';
            $dosya_yolu=$hedef_klasor.'/'.$dosya_adi;
            $resim->move($hedef_klasor,$dosya_adi);
            $ayar->logo=$dosya_yolu;
        }

        $ayar->save();

        if ($ayar)
        {
            alert()
                ->success('Başarılı !', 'Güncelleme İşlemi Başarılı !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Güncelleme İşlemi Başarısız !')
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
        //
    }
}
