<?php

namespace App\Http\Controllers;

use App\Turler;
use Illuminate\Http\Request;

class TurlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turler=Turler::all();

        return view('admin.turler.index',compact('turler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.turler.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turler=new Turler();

        $turler->adi=request('adi');
        $turler->aciklama=request('aciklama');

        $turler->save();

        if ($turler)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('turler.index');
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
        $tur=Turler::find($id);

        if ($tur->aktif==1){
            $tur->aktif=0;
        }
        else{
            $tur->aktif=1;
        }

        $tur->save();

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
        $turler=Turler::find($id);

        return view('admin.turler.edit',compact('turler'));
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
        $turler=Turler::find($id);

        $turler->adi=request('adi');
        $turler->aciklama=request('aciklama');

        $turler->save();

        if ($turler)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('turler.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Düzenleme İşlemi Başarısız !')
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
        $tur=Turler::destroy($id);

        if ($tur){
            alert()
                ->success('Başarılı !', 'Silme İşlemi Başarılı !')
                ->autoClose(3000);
            return redirect()->route('turler.index');
        }
        else{
            alert()
                ->success('Başarısız !', 'Silme İşlemi Başarısız !')
                ->autoClose(3000);
            return back();
        }
    }
}
