<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;
use App\Models\Admin\General\CreditSetting;
use App\Models\Admin;
use App\Models\User;
use App\Models\Admin\General\DongleUser;
use App\Models\Admin\Editer\Brand;
use App\Models\Admin\Editer\Feature;
use App\Models\Admin\Editer\PhoneModel;

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

        $credit_amount_to_active_user_six_month = CreditSetting::where('type', 'credit_amount_to_active_user_six_month')->select('value')->first();
        $credit_amount_to_active_user_twelve_month = CreditSetting::where('type', 'credit_amount_to_active_user_twelve_month')->select('value')->first();
        $credit_amount_to_active_dongle_user = CreditSetting::where('type', 'credit_amount_to_active_dongle_user')->select('value')->first();
        $user_max_credit_amount = CreditSetting::where('type', 'user_max_credit_amount')->select('value')->first();

        $per_page= 10;
        $pages = [5, 10, 25, 50];
        $six_month_activate_price = $credit_amount_to_active_user_six_month->value;
        $twelve_month_activate_price = $credit_amount_to_active_user_twelve_month->value;
        $dongle_user_activate_price = $credit_amount_to_active_dongle_user->value;
        $max_credit_amount = $user_max_credit_amount->value;
        $infinite_amount = 99999;
        $status = [
            '0' => 'Failed',
            '1' => 'Success'
        ];
        $history_types = [
            '0' => 'Select a type of history',
            '1' => 'Added',
            '2' => 'Changed',
            '3' => 'Depricated',
            '4' => 'Removed',
            '5' => 'Fixed',
            '6' => 'Security',
            '7' => 'Unreleased',
        ];

        $our_users = User::count() + DongleUser::count();
        $total_brands = Brand::count();
        $total_models = PhoneModel::count();
        $total_features = Feature::count();

        $super_admin = Admin::role('SuperAdmin')->first();
        config(['pagination.per_page' => $per_page, 'six_month_activate_price' => $six_month_activate_price, 'twelve_month_activate_price' => $twelve_month_activate_price, 'dongle_user_activate_price' => $dongle_user_activate_price, 'max_credit_amount' => $max_credit_amount, 'infinite_amount' => $infinite_amount, 'history_types' => $history_types]);
        View::share(['status' => $status, 'max_credit_amount' => $max_credit_amount, 'infinite_amount' => $infinite_amount, 'super_admin' => $super_admin, 'our_users' => $our_users, 'total_brands' => $total_brands, 'total_models' => $total_models, 'total_features' => $total_features, 'pages' => $pages, 'history_types' => $history_types]);
    }
}
