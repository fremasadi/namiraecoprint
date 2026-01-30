<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\HeaderComposer;
use App\View\Composers\HeroComposer;
use App\View\Composers\AboutComposer;
use App\View\Composers\FooterComposer;
// use Illuminate\Support\Facades\URL;

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

        // if (app()->environment('local')) {
        //     URL::forceScheme('https');
        // }

        View::composer('front.partials.*', HeaderComposer::class);

        // Composer khusus untuk hero section
        View::composer('front.partials.hero', HeroComposer::class);

        // Composer khusus untuk about section
        View::composer('front.partials.about', AboutComposer::class);

        View::composer('front.partials.footer', FooterComposer::class);

    }

}
