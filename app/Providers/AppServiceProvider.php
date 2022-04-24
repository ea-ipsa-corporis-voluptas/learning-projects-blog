<?php

namespace App\Providers;

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
        //------------------------------------------------
        //------------------------------------------------
        //
        //                  NEWSLETTER
        //
        app()->bind(\App\Services\Newsletter::class, function() {
            $client = (new \MailchimpMarketing\ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us14'
            ]);
            return new \App\Services\MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //------------------------------------------------
        //------------------------------------------------
        //
        //                  ADMIN
        //
        // GATE
        \Illuminate\Support\Facades\Gate::define('admin', fn(\App\Models\User $user)
            => $user->userName === 'AUserName');

        // BLADE
        \Illuminate\Support\Facades\Blade::if('admin', fn()
            => request()->user()?->can('admin'));

        //
        //------------------------------------------------
        //------------------------------------------------
        //
        //                  FOLLOW
        //
        // BLADE
        \Illuminate\Support\Facades\Blade::if('follow', fn(\App\Models\User $user)
            => auth()->user()?->following($user));
            
    }
}
