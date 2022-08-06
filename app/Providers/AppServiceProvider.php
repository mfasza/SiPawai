<?php

namespace App\Providers;

use App\pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //compose all the views....
        view()->composer(['home', 'pegawai', 'spmt.spmt-kelola', 'spmt.spmt-monitoring', 'kgb.kgb-monitoring', 'kgb.kgb-kelola'], function ($view) 
        {
            $namaUser = Pegawai::find(Auth::user()->nip)->nama;
            
            //...with this variable
            $view->with('namaUser', $namaUser );    
        });
    }
}
