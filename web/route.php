<?php

/**
 * Web application Router. This is where all protocols will be located
 */

/**
 * Route Arguments
 * - view: Returns a view
 * - request: Returns a request controller
 * - action: Define an action for the request, if not defined. push index()
 */


$Route['run_migrate'] = [
    'endpoint' => 'migration',
    'view' => 'migration'
];

/**
 * Public Router
 */
$Route['/'] = [
    'view' => 'frontend/home/home',
];
$Route['about'] = [
    'view' => 'frontend/home/about',
    'request' => 'home/home'
];
$Route['blog'] = [
    'view' => 'frontend/blog/blog'
];
$Route['events'] = [
    'view' => 'frontend/events/events'
];
$Route['reservations'] = [
    'view' => 'frontend/home/reservations'
];
$Route['login'] = [
    'view' => 'frontend/login/login'
];
$Route['track'] = [
    'view' => 'frontend/track/track'
];


/**
 * Admin Router
 */

$Route['dashboard'] = [
    'request' => 'dashboard/dashboard',
];

/**
 * Reservation Routes
 * ----------------------------------------------------------------
 */
$Route['dashboard/reservation'] = [
    'request' => 'dashboard/reservation',
];
$Route['dashboard/reservation/pending'] = [
    'request' => 'dashboard/pending_reservation',
];
$Route['dashboard/reservation/archive'] = [
    'request' => 'dashboard/archive_reservation',
];

$Route['dashboard/reservation/categories'] = [
    'view' => 'admin/reservation/reservation_categories',
    'request' => 'dashboard/reservation',
];

/** End Reservation routes */

$Route['dashboard/security'] = [
    'view' => 'admin/security/security',
    'request' => 'dashboard/dashboard',
];

/**
 * Posts Routes
 * --------------------------------------------------------------------
 */
$Route['dashboard/post'] = [
    'request' => 'dashboard/post',
];

$Route['dashboard/post/categories'] = [
    'view' => 'admin/post/categories',
    'request' => 'dashboard/post',
];

$Route['preview/post'] = [
    'request' => 'dashboard/post',
];


/** End Posts routes */

$Route['dashboard/events'] = [
    'request' => 'dashboard/event',
];

$Route['dashboard/user'] = [
    'view' => 'admin/user/user',
    'request' => 'dashboard/dashboard',
];

$Route['dashboard/settings'] = [
    'view' => 'admin/dashboard/settings',
    'request' => 'dashboard/dashboard',
];


return $Route;
