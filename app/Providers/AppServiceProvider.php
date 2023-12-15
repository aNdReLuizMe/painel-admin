<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['pt_BR', 'en']) // also accepts a closure
                ->labels([
                    'pt_BR' => 'Português (BR)',
                    'en' => 'USA english (EN)',
                ])
                ->flags([
                    'pt_BR' => asset('/storage/flags/br.svg'),
                    'en' => asset('/storage/flags/us.svg'),
                ])
                ->circular()
                ->visible(outsidePanels: true);
        });
    }
}
