<?php

namespace App\Http\Controllers;

use App\Kategoriler;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriler=Kategoriler::all();
        return view('admin.kategoriler.index',compact('kategoriler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.kategoriler.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori=new Kategoriler();

        $kategori->adi=request('adi');
        $kategori->aciklama=request('aciklama');

        $kategori->save();
        if ($kategori)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kategoriler.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Kaydetme İşlemi Başarısız !')
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
    {
        $aktif=Kategoriler::find($id);

        if ($aktif->aktif==1){
            $aktif->aktif=0;
        }
        else{
            $aktif->aktif=1;
        }


        $aktif->save();

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
        $kategori=Kategoriler::find($id);
        return view('admin.kategoriler.edit',compact('kategori'));
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
        $kategori=Kategoriler::find($id);

        $kategori->adi=request('adi');
        $kategori->aciklama=request('aciklama');

        $kategori->save();

        if ($kategori)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kategoriler.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Dzüenleme İşlemi Başarısız !')
                ->autoClose(2000);
            return redirect()->route('kategoriler.index');
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
        Kategoriler::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(3000);
        return redirect()->route('kategoriler.index');

    }
}
