<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Algolia
use App\Contracts\Search;

use AlgoliaSearch\Client;

use App\Services\AlgoliaSearch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Search::class, function()
        {
            $config = config('services.algolia');

            return new AlgoliaSearch(
                // new Client($config['app_id'], $config['api_key'])
                new Client('U771ULPBFJ','053fe8b76efcfad0e2d6b61d7c86bb4b')
                // new Client('U771ULPBFJ','b54e349df377eff4a74fce3a93fede88')
            );
        });
    }
}
