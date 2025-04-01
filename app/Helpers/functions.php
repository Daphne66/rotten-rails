<?php

use App\Helpers\ReCaptchaHelper;

if (!function_exists('htmlScriptTagJsApi')) {
    /**
     * Generate the reCAPTCHA script tag for inclusion in the document head.
     *
     * @return string
     */
    function htmlScriptTagJsApi() {
        return ReCaptchaHelper::htmlScriptTagJsApi();
    }
}

if (!function_exists('htmlFormSnippet')) {
    /**
     * Generate the reCAPTCHA HTML widget for inclusion in the form.
     *
     * @return string
     */
    function htmlFormSnippet() {
        return ReCaptchaHelper::htmlFormSnippet();
    }
}