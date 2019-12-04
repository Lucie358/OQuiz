<?php

namespace App\Providers;

use App\Utils\UserSession;
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

    public function boot()
    {
        // Dans ce ServiceProvider, la méthode boot sera toujorus exécutée
        // View::share() permet d'envoyer des variables à toutes les vues tout le temps
        View::share('user', UserSession::getUser());
    }
}
