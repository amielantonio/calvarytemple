<?php

/**
 * Web application Router. This is where all protocols will be located
 */


$Route['run_migrate'] = [
    'endpoint' => 'migration',
    'view' => 'migration'
];

/**
 * Public Router
 */
$Route['/'] = [
    'endpoint' => 'public',
    'view' => 'home/home',
];
$Route['about'] = [
    'endpoint' => 'public',
    'view' => 'home/about',
    'resource' => true,
    'request' => 'home/home'
];
$Route['post'] = [
    'endpoint' => 'public',
    'view' => 'post/post'
];
$Route['events'] = [
    'endpoint' => 'public',
    'view' => 'events/events'
];
$Route['reservations'] = [
    'endpoint' => 'public',
    'view' => 'home/reservations'
];
$Route['login'] = [
    'endpoint' => 'public',
    'view' => 'login/login'
];
$Route['track'] = [
    'endpoint' => 'public',
    'view' => 'track/track'
];


/**
 * Admin Router
 */


$Route['dashboard'] = [
    'endpoint' => 'admin',
    'request' => 'dashboard/dashboard',
    'resource' => true
];

/**
 * Reservation Routes
 * ----------------------------------------------------------------
 */
$Route['dashboard/reservation'] = [
    'request' => 'dashboard/reservation',
    'resource' => true
];
$Route['dashboard/reservation/pending'] = [
    'request' => 'dashboard/pending_reservation',
    'resource' => true
];
$Route['dashboard/reservation/archive'] = [
    'request' => 'dashboard/archive_reservation',
    'resource' => true
];

$Route['dashboard/reservation/categories'] = [
    'endpoint' => 'admin',
    'view' => 'reservation/reservation_categories',
    'request' => 'dashboard/reservation',
    'resource' => true
];

/** End Reservation routes */

$Route['dashboard/security'] = [
    'endpoint' => 'admin',
    'view' => 'security/security',
    'request' => 'dashboard/dashboard',
];
$Route['dashboard/events'] = [
    'endpoint' => 'admin',
    'view' => 'events/events',
    'request' => 'dashboard/dashboard',
    'resource' => true
];

/**
 * Posts Routes
 * --------------------------------------------------------------------
 */
$Route['dashboard/post'] = [
    'request' => 'dashboard/post',
    'resource' => true
];

$Route['dashboard/post/categories'] = [
    'endpoint' => 'admin',
    'view' => 'post/categories',
    'request' => 'dashboard/post',
    'resource' => true
];


/** End Posts routes */


$Route['dashboard/user'] = [
    'endpoint' => 'admin',
    'view' => 'user/user',
    'request' => 'dashboard/dashboard',
    'resource' => true
];

$Route['dashboard/settings'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/settings',
    'request' => 'dashboard/dashboard',
    'resource' => true
];


return $Route;
