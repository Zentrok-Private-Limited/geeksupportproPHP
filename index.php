<?php
/**
 * Front controller — routes all requests to the correct page file.
 * Drop everything under php-site/ on any PHP host and add the .htaccess below.
 */

/* ------------------------------------------------------------------ */
/*  Serve static assets from root or public/ folder                   */
/*  Maps requests like /images/logo.webp                              */
/*  Works with PHP built-in server, Apache, Nginx — any setup.        */
/* ------------------------------------------------------------------ */
$uri_raw = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$static  = __DIR__ . $uri_raw;
if (!is_file($static)) {
    $static = __DIR__ . '/public' . $uri_raw;
}

if ($uri_raw !== '/' && is_file($static)) {
    $ext = strtolower(pathinfo($static, PATHINFO_EXTENSION));
    $mimeTypes = [
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif'  => 'image/gif',
        'webp' => 'image/webp',
        'svg'  => 'image/svg+xml',
        'ico'  => 'image/x-icon',
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'woff' => 'font/woff',
        'woff2'=> 'font/woff2',
        'ttf'  => 'font/ttf',
        'json' => 'application/json',
    ];
    header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
    header('Cache-Control: public, max-age=2592000'); // 30 days
    readfile($static);
    exit;
}

/* ------------------------------------------------------------------ */
/*  Normal page routing                                               */
/* ------------------------------------------------------------------ */
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

$routes = [
    '/'                    => 'pages/home.php',
    '/home'                => 'pages/home.php',
    '/support'             => 'pages/support.php',
    '/services'            => 'pages/services.php',
    '/remote-support'      => 'pages/remote-support.php',
    '/schedule-repair'     => 'pages/schedule-repair.php',
    '/contact'             => 'pages/contact.php',
    '/membership'          => 'pages/membership.php',
    '/faq'                 => 'pages/faq.php',
    '/devices'             => 'pages/devices.php',
    '/privacy'             => 'pages/privacy.php',
    '/privacy-policy'      => 'pages/privacy.php',
    '/terms'               => 'pages/terms.php',
    '/terms-and-conditions'=> 'pages/terms.php',
    '/search'              => 'pages/search.php',
];

// Match device sub-routes: /devices/computers, /devices/phones, etc.
if (preg_match('#^/devices/([a-z0-9\-]+)$#', $uri, $m)) {
    $_GET['device'] = $m[1];
    $page = 'pages/device-detail.php';
} elseif (isset($routes[$uri])) {
    $page = $routes[$uri];
} else {
    $page = 'pages/404.php';
}

require __DIR__ . '/' . $page;
