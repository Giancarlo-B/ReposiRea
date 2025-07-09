<?php

namespace App\Providers;
use App\Models\Postulante;
use App\Observers\PostulanteObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Postulante::observe(PostulanteObserver::class);
    }
}
