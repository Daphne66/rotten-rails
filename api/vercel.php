<?php

// Configuración específica para Vercel
if (isset($_ENV['VERCEL_URL'])) {
    $_ENV['APP_URL'] = 'https://' . $_ENV['VERCEL_URL'];
    $_ENV['APP_ENV'] = 'production';
    $_ENV['APP_DEBUG'] = false;
}

// Configuración de rutas de caché
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';
$_ENV['SSR_TEMP_PATH'] = '/tmp/ssr';

// Incluir el archivo index.php principal
require __DIR__ . '/index.php';