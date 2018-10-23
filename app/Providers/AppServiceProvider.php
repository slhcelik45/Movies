<?php

namespace App\Providers;

use App\Ayarlar;
use App\Kategoriler;
use App\Turler;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $ayar=Ayarlar::find(1);
        $kategoriler=Kategoriler::all();
        $turler=Turler::all();

        View::share([
           'ayar'=>$ayar,
           'kategoriler'=>$kategoriler,
           'turler'=>$turler,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
