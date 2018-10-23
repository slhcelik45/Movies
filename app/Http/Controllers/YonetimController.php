<?php

namespace App\Http\Controllers;

use App\User;
use App\Yorumlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class YonetimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yorum=Yorumlar::all();
        return view('admin.index',compact('yorum'));
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
        //
    }
    public function kullanici()
    {
        $kullanicilar=User::where('yetki','!=','admin')
            ->where('active','=',1)
            ->get();
        return view('admin.kullanicilar.index',compact('kullanicilar'));
    }

    public  function kullaniciekle()
    {
        return view('admin.kullanicilar.create');
    }
    public function YoneticiEkle(){
        $kullanicilar=User::where('yetki','=','admin')
            ->where('active','=',1)
            ->get();
        return view('admin.kullanicilar.uye',compact('kullanicilar'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function kullanicikayit(Request $request)
    {

        $kullanici=new User();

        $kullanici->name=request('name');
        $kullanici->email=request('email');
        $kullanici->phone=request('phone');

        if (request('yetki')!='admin')
        {
            $kullanici->yetki='';
        }
        else
        {
            $kullanici->yetki='admin';
        }

        if (request('password')!=request('password_confirmation'))
        {
            alert()
                ->error('Hata !', 'Şifreler Uyumsuz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $kullanici->password=Hash::make(request('password'));
        }

        if (request()->hasFile('avatar'))
        {
            $this->validate(request(),array('avatar'=>'image|mimes:png,jpg,jpeg,gif|max:2048'));

        $resim=request()->file('avatar');
        $dosya_adi='avatar'.'-'.time().'.'.$resim->extension();

        if ($resim->isValid())
        {
            $hedef_klasor='uploads/dosyalar';
            $dosya_yolu=$hedef_klasor.'/'.$dosya_adi;
            $resim->move($hedef_klasor,$dosya_adi);
            $kullanici->avatar=$dosya_yolu;
        }
        }

        $kullanici->save();
        if ($kullanici)
        {
            alert()
                ->success('Başarılı !', 'Kullanıcı Ekleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kullanici.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kullanıcı Ekleme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    public function kullaniciduzenle($id)
    {
        $kullanici=User::find($id);
        return view('admin.kullanicilar.edit',compact('kullanici'));
    }
    public function kullaniciguncelle(Request $request,$id)
    {
        $this->validate(request(),array
        (
            'name'=>'required',
            'email'=>'required'
        ));

        $kullanici=User::find($id);

        $kullanici->name=request('name');
        $kullanici->email=request('email');

        if (request('yetki')!='admin')
        {
            $kullanici->yetki='';
        }
        else
        {
            $kullanici->yetki='admin';
        }

        if (request('password')!=request('password_confirmation'))
        {
            alert()
                ->error('Hata !', ' Yeni Şifreler Uyumsuz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $kullanici->password=Hash::make(request('password'));
        }

        if (request()->hasFile('avatar'))
        {
            $this->validate(request(),array('avatar'=>'image|mimes:png,jpg,jpeg,gif|max:2048'));

        $resim=request()->file('avatar');
        $dosya_adi='avatar'.'-'.time().'.'.$resim->extension();

        if ($resim->isValid())
        {
            $hedef_klasor='uploads/dosyalar';
            $dosya_yolu=$hedef_klasor.'/'.$dosya_adi;
            $resim->move($hedef_klasor,$dosya_adi);
            $kullanici->avatar=$dosya_yolu;
        }
        }

        $kullanici->save();
        if ($kullanici)
        {
            alert()
                ->success('Başarılı !', 'Kullanıcı Güncelleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kullanici.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kullanıcı Güncelleme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    public function kullanicisil($id)
    {
        $sil=User::find($id)->delete();

        if ($sil)
        {
            alert()
                ->success('Başarılı !', 'Kullanıcı Silme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kullanici.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kullanıcı Silme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }
    public function kullaniciaktif($id){
        $user=User::find($id);

        if ($user->active==1){
            $user->active=0;
        }
        else{
            $user->active=1;
        }

        $user->save();

        return back();

    }

    public function cikis()
    {
        auth()->logout();
        return redirect('/');
    }
}
