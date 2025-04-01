<?php

namespace App\Helpers;

class ReCaptchaHelper
{
    /**
     * Genera el script de reCAPTCHA para incluir en el head del documento.
     *
     * @return string
     */
    public static function htmlScriptTagJsApi()
    {
        $siteKey = config('recaptcha.api_site_key');
        $lang = config('recaptcha.default_language', 'es');
        
        return '<script src="https://www.google.com/recaptcha/api.js?hl=' . $lang . '" async defer></script>';
    }

    /**
     * Genera el HTML del widget de reCAPTCHA para incluir en el formulario.
     *
     * @return string
     */
    public static function htmlFormSnippet()
    {
        $siteKey = config('recaptcha.api_site_key');
        
        return '<div class="g-recaptcha" data-sitekey="' . $siteKey . '"></div>';
    }
}