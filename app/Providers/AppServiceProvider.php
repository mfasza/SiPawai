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
        view()->composer(['home', 'pegawai', 'pegawai-create', 'spmt.spmt-kelola', 'spmt.spmt-monitoring', 'kgb.kgb-monitoring', 'kgb.kgb-kelola'], function ($view) 
        {
            $user = Pegawai::join('users', 'pegawais.nip', '=', 'users.nip')->find(Auth::user()->nip);
            
            //...with this variable
            $view->with('user', $user );    
        });
    }
}
