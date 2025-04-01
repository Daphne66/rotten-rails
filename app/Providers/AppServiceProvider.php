<?php

namespace App\Providers;

use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Validator;
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
        // Registrar la regla de validación personalizada para reCAPTCHA
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $rule = new ReCaptcha();
            $fails = false;
            
            $rule->validate($attribute, $value, function ($message) use (&$fails) {
                $fails = true;
            });
            
            return !$fails;
        }, 'La verificación de reCAPTCHA ha fallado. Por favor, inténtelo de nuevo.');
    }
}
