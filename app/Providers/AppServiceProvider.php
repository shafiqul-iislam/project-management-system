<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('settings')) {

            config([
                'mail.mailers.smtp.host' => Setting::get('mail_host'),
                'mail.mailers.smtp.port' => Setting::get('mail_port'),
                'mail.mailers.smtp.username' => Setting::get('mail_username'),
                'mail.mailers.smtp.password' => Setting::get('mail_password'),
                'mail.mailers.smtp.encryption' => Setting::get('mail_encryption'),

                'mail.from.address' => Setting::get('mail_from_address'),
                'mail.from.name' => Setting::get('mail_from_name'),
            ]);
        }


        Blade::component('admin-layout', \App\View\Components\AdminLayout::class);
        Blade::component('developer-layout', \App\View\Components\DeveloperLayout::class);
    }
}
