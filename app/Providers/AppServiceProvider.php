<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('rupiah', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        Carbon::setLocale(config('app.locale'));
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function register()
    {
        //
    }
}
