<?php

namespace Sarfrazrizwan\LaravelZerobounce;

use Illuminate\Support\Facades\Validator;
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

        $this->app->singleton(ZeroBounceFacade::class, function () {

            $apiKey = config('zero-bounce.api_key');

            if (!$apiKey || ! is_string($apiKey)  ) {
                throw ApiKeyIsMissing::create();
            }

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
        Validator::extend('real_email', function ($attribute, $value, $parameters, $validator) {
            return ZeroBounceFacade::validate($value)->status === 'valid';
        }, 'The email address provided could not be verified as valid');
    }
}