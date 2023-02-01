<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('APP_ENV') === 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        // if(env('APP_ENV') !== 'local') {
        //     URL::forceScheme('https');
        // }

        if(env('APP_ENV') === 'production') {
            $url->formatScheme('https');
        }

        $per_page= 5;
        $max_credit_amount = 100;
        $infinite_amount = 99999;
        $status = [
            '0' => 'Failed',
            '1' => 'Success'
        ];

        config(['pagination.per_page' => $per_page, 'max_credit_amount' => $max_credit_amount, 'infinite_amount' => $infinite_amount]);
        View::share(['status' => $status]);
    }
}
