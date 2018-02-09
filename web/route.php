<?php

/**
 * Web application Router. This is where all protocols will be located
 */

/**
 * Route Keys
 * - view: Returns a GET request for the view
 * - request: Returns a request controller
 * - action: Define an action for the request, if not defined. push index()
 * - action => resource: defines the Request URI to handle HTTP methods.
 * - middleware: An intermediary security between a route and a request
 */


$Route['run_migrate'] = [
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
    'request' => 'dashboard/dashboard'
];

/**
 * Reservation Routes
 * ----------------------------------------------------------------
 */
$Route['dashboard/reservation'] = [
    'request' => 'dashboard/reservation',
    'action' => 'resource'
];
$Route['dashboard/reservation/pending'] = [
    'request' => 'dashboard/pending_reservation',
    'action' => 'resource'
];
$Route['dashboard/reservation/archive'] = [
    'request' => 'dashboard/archive_reservation',
    'action' => 'resource'
];

$Route['dashboard/reservation/categories'] = [
    'view' => 'admin/reservation/reservation_categories',
    'request' => 'dashboard/reservation',
    'action' => 'resource'

];

/** End Reservation routes */

$Route['dashboard/security'] = [
    'view' => 'admin/security/security',
    'request' => 'dashboard/dashboard',
    'action' => 'resource'
];

/**
 * Posts Routes
 * --------------------------------------------------------------------
 */
$Route['dashboard/post'] = [
    'request' => 'dashboard/post',
    'action' => 'resource'
];

$Route['dashboard/post/categories'] = [
    'view' => 'admin/post/categories',
    'request' => 'dashboard/post',
    'action' => 'resource'
];

$Route['preview/{post}'] = [
    'request' => 'dashboard/post',
];


/** End Posts routes */

$Route['dashboard/events'] = [
    'request' => 'dashboard/event',
    'action' => 'resource'
];

$Route['dashboard/user'] = [
    'view' => 'admin/user/user',
    'request' => 'dashboard/dashboard',
    'action' => 'resource'
];

$Route['dashboard/settings'] = [
    'view' => 'admin/dashboard/settings',
    'request' => 'dashboard/dashboard',
    'action' => 'resource'
];


return $Route;
