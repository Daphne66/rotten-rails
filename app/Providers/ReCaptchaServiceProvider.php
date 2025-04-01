<?php

namespace App\Providers;

use App\Helpers\ReCaptchaHelper;
use Illuminate\Support\ServiceProvider;

class ReCaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Registrar las funciones de ayuda como funciones globales
        $this->registerHelperFunctions();
    }
    
    /**
     * Register helper functions for reCAPTCHA.
     */
    protected function registerHelperFunctions(): void
    {
        require_once __DIR__ . '/../Helpers/functions.php';
    }
}