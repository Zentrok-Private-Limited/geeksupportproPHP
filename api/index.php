<?php
/**
 * Vercel Serverless PHP Entry Point
 * 
 * Vercel's vercel-php runtime executes files inside api/.
 * This file bootstraps the main front controller from the parent directory.
 */

// Point __DIR__ references to the project root (one level up from api/)
$root = dirname(__DIR__);

require_once $root . '/includes/config.php';
require_once $root . '/includes/helpers.php';
require_once $root . '/includes/layout.php';
require_once $root . '/includes/header.php';
require_once $root . '/includes/footer.php';

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
    http_response_code(404);
    $page = 'pages/404.php';
}

require $root . '/' . $page;
