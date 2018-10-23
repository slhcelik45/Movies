<?php

namespace App\Http\Controllers;

use App\Yorumlar;
use Illuminate\Http\Request;

class YorumlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yorumlar=Yorumlar::all();

        return view('admin.yorum.index',compact('yorumlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yorum=Yorumlar::find($id);

        if ($yorum->aktif==1){
            $yorum->aktif=0;
        }
        else{
            $yorum->aktif=1;
        }

        $yorum->save();

        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Yorumlar::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(2000);
       return back();
    }
}
