<?php

return [
    /**
     * The site key
     * get site key @ www.google.com/recaptcha/admin
     */
    'api_site_key' => env('RECAPTCHA_SITE_KEY', '6LceP_0qAAAAAGW2Vs7CVTVumdJOtyl8q-lp2r6G'),

    /**
     * The secret key
     * get secret key @ www.google.com/recaptcha/admin
     */
    'api_secret_key' => env('RECAPTCHA_SECRET_KEY', '6LceP_0qAAAAAAfBDvjro7hXitKvEcEX3Bc0RNgv'),

    /**
     * ReCAPTCHA version
     * Supported: "v2", "invisible", "v3"
     */
    'version' => 'v2',

    /**
     * IP addresses for which validation will be skipped
     */
    'skip_ip' => [],

    /**
     * Default language
     */
    'default_language' => 'es',

    /**
     * The error message key
     */
    'error_message_key' => 'validation.recaptcha',
];