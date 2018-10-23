<?php

namespace App\Http\Controllers;

use App\Filmler;
use App\Yorumlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $tarih=date('m');//Bulunduğumuz ay degerini veririr. Orn:10
        $slider=Filmler::where('slaydir',1)->get();//slaydir degeri "1" olan filmleri getirir.
        $deger=Yorumlar::max('puan');//Ytorumların en yüksek puan degerini alır.
        $yorum=Yorumlar::where('puan','=',$deger)->get();//Yorumlerın en yük sek degere sahip yorumları getirir.
        $idm=Filmler::where('cesit','=',1)
                    ->max('idmPuan');//cesitId "1" olan filmlerin en yüksek IDM puannını bulur
        $idmFilm=Filmler::where('idmPuan','=',$idm)->get();//IDM en yüksek olan filmleri getirir.
        $sonFilm=Filmler::whereMonth('created_at', $tarih)->get();//SOn eklenen filmelri getirir.
        $film=Filmler::where('cesit','=',1)->get();//cesitId "1" olan filmleri getirir.

        $tumu=Filmler::take(15)->get();//15 film gitirir.

        $tiklama=$tumu->sortByDesc(function ($tumu){
            return $tumu->getViews();
        });//15 filmin en fazla izleme degerine göre büyüktem küçüğe getirir.

        //compact('film') ile film degeişkeni ile deger gönderilir.
        return view('anasayfa.index',compact('slider','idmFilm','yorum','sonFilm','film','tiklama'));//anasayfa index sayfasına yazılına tüm degerleri gönderiyor
    }
    public function kategori($id){
        $film=Filmler::where('kategoriId','=',$id)->get();
        //kategori bazlı filmelri listeler.
        return view('anasayfa.filmler',compact('film'));
    }
    public function tur($id){
        $film=Filmler::where('turId','=',$id)->get();
        //tür bazlı filmleri listeler.
        return view('anasayfa.filmler',compact('film'));
    }
    public function filmler($id){
        $film=Filmler::where('cesit','=',$id)->get();
        //tüm filmleri listeler.
        return view('anasayfa.filmler',compact('film'));
    }

    public function dizi($id){
        $film=Filmler::where('cesit','=',$id)->get();
        //tüm dizile listeler.
        return view('anasayfa.filmler',compact('film'));
    }
    public function fragman($id){
        $film=Filmler::where('cesit','=',$id)->get();
        //tüm fragmanları listeler.
        return view('anasayfa.filmler',compact('film'));
    }
    public function filmdetay($id){
        $film=Filmler::find($id);//film tıklandıgında detay sayfasına filmi listeler.
        $ekle=$film->addView();//filmin detayına gidildiğinde ziyarat sayısını 1 artırır.

        $yorum=Yorumlar::where('filmId','=',$film->id)
                        ->where('aktif','=',1)
                        ->get();//filme ait yorumları ve yorumların aktif olmus yorumları listeler.

        $yorumlar=Yorumlar::where('aktif','=',1)->orderby('updated_at','desc')->get();
        //yorumların aktif olmus ve güncelleme tarihine büyükten küçüge sıralar.

        $tumu=Filmler::take(5)->get(); //filmlerin 5 tane getirir.

        $tiklama=$tumu->sortByDesc(function ($tumu){
           return $tumu->getViews();
        });//filmlerin ziyaret sayısına göre büyükten küçüge 5 deger alır.

        return view('anasayfa.detay',compact('film','yorum','yorumlar','tiklama'));
        //anasayfa detay syfasına compact() ile deger gönderdik.
    }

    public function yorumgonder(Request $request)
    {
        $yorum=new Yorumlar();//yarum nesnesini Yorumlar modelinden olusturduk.

        $yorum->uyeId=Auth::user()->id;//userId'sini giriş yapan kullanıcıyı aldık.
        $yorum->filmId=request('filmId');//detay sayfasındaki filmin Id'sini aldık
        $yorum->aciklama=request('aciklama');//kullaıcının yorumunu alıyoruz.
        $yorum->puan=request('puan');//kullanıcının puan degerini alıyoruz.
        $yorum->aktif=0;//aktif degerini ilk başta 0 olarak belirliyoruz. Admin yorumu aktif edince yorum istenilen yerde gösterilir.

        $yorum->save();//aldıgımız degerleri yorumlar tablosuna kaydettik.
        alert()
            ->success('Teşekkürler !', 'Yorumunuz Onay Bekliyor !')
            ->autoClose(2000);
        return back();//ekrana basarı mesajı verdik.
    }

    public function hakkimizda(){

        return view('anasayfa.hakkimizda');//hakkımızda sayfanısı gösterdik
    }

    public function arama(Request $request){

        $this->validate(request(),array('kelime'=>'required'));//boş arama yapmasını engelledik.
        $kelime=request('kelime');//aramak istedigi kilimeyi aldık.
        $film=Filmler::where('aciklama','like','%'.$kelime.'%')->latest()->paginate(5);
        //Filmler tablosundaki aciklama kısmında arama yapar.
        return view('anasayfa.arama',compact('film'));//arama degerlerini arama sayfasına gönderir.
    }
}
