<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

//ortak route(yonlendirme)
Route::group(['prefix'=>'yonetim','middleware'=>'auth'],function() {
    Route::get('cikis','YonetimController@cikis')->name('yonetim.cikis');
    Route::post('yorumgonder','HomeController@yorumgonder')->name('yorum.gonder');
});

//Admin yerkilerinin route(yönlendirme kısmı)
Route::group(['prefix'=>'yonetim','middleware'=>'admin'],function ()
{
    Route::get('/','YonetimController@index')->name('yonetim.index');
    Route::resource('ayarlar','AyarController');
    Route::resource('kategoriler','KategoriController');
    Route::resource('filmler','FilmlerController');
    Route::resource('turler','TurlerController');
    Route::resource('yorumlar','YorumlarController');
    Route::get('kullanici','YonetimController@kullanici')->name('kullanici.index');
    Route::get('kullaniciekle','YonetimController@kullaniciekle')->name('kullanici.ekle');
    Route::post('kullanicikayit','YonetimController@kullanicikayit')->name('kullanici.kayit');
    Route::get('kullaniciduzenle/{id}','YonetimController@kullaniciduzenle')->name('kullanici.duzenle');
    Route::post('kullaniciguncelle/{id}','YonetimController@kullaniciguncelle')->name('kullanici.guncelle');
    Route::delete('kullanicisil/{id}','YonetimController@kullanicisil')->name('kullanici.sil');
    Route::get('kullaniciaktif/{id}','YonetimController@kullaniciaktif')->name('kullanici.aktif');
    Route::get('YoneticiEkle','YonetimController@YoneticiEkle')->name('yonetici.ekle');
});
Auth::routes();

//Film gösterim safyalama routları(yönlendirme)
Route::get('/', 'HomeController@index')->name('anasayfa');
Route::get('kategori/{id}','HomeController@kategori')->name('kategori.goster');
Route::get('tur/{id}','HomeController@tur')->name('tur.goster');
Route::get('filmler/{id}','HomeController@filmler')->name('film.goster');
Route::get('diziler/{id}','HomeController@dizi')->name('dizi.goster');
Route::get('fragmanlar/{id}','HomeController@fragman')->name('fragman.goster');
Route::get('filmdetay/{id}','HomeController@filmdetay')->name('film.detay');
Route::get('hakkimizda','HomeController@hakkimizda')->name('hakkimizda.getir');
Route::post('kullanicikayit','YonetimController@kullanicikayit')->name('kullanici.kayit');
Route::post('arama','HomeController@arama')->name('arama.yap');
