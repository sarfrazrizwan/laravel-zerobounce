<?php

namespace Sarfrazrizwan\LaravelZerobounce;

use Illuminate\Support\ServiceProvider;
use Sarfrazrizwan\LaravelZerobounce\Exceptions\ApiKeyIsMissing;
use ZeroBounce\SDK\ZeroBounce;
use Sarfrazrizwan\LaravelZerobounce\Facades\ZeroBounce as ZeroBounceFacade;

class ZeroBounceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'zero-bounce');


        $apiKey = config('zero-bounce.api_key');

        if (!$apiKey || ! is_string($apiKey)  ) {
            throw ApiKeyIsMissing::create();
        }

        $this->app->singleton(ZeroBounceFacade::class, function ($app) use($apiKey) {

            ZeroBounce::Instance()->initialize($apiKey);
            return ZeroBounce::Instance();
        });

        $this->app->alias(ZeroBounceFacade::class, 'zerobounce');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}