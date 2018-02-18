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
    'request' => 'home/reservation',
    'action' => 'resource'
];
$Route['login'] = [
    'view' => 'frontend/login/login'
];
$Route['logout'] = [
    'request' => 'home/login',
    'action' => 'logout'
];
$Route['track'] = [
    'view' => 'frontend/track/track'
];

$Route['auth'] = [
    'request' => 'home/login',
    'action' => 'auth'
];


/**
 * Admin Router
 */

$Route['dashboard'] = [
    'request' => 'dashboard/dashboard',
    'middleware' => 'auth'
];

/**
 * Reservation Routes
 * ----------------------------------------------------------------
 */
$Route['dashboard/reservation'] = [
    'request' => 'dashboard/reservation',
    'action' => 'resource'
];
$Route['dashboard/reservation/all'] = [
    'request' => 'dashboard/reservation',
    'action' => 'get_all'
];
$Route['dashboard/reservation/pending'] = [
    'request' => 'dashboard/pending_reservation',
    'action' => 'resource'
];
$Route['dashboard/reservation/pending/{resource}/approve'] = [
    'request' => 'dashboard/pending_reservation',
    'action' => 'pending_approve'
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
$Route['dashboard/reservation/save_category'] = [
    'request' => 'dashboard/reservation',
    'action' => 'savecat'
];

/** End Reservation routes */

$Route['dashboard/security'] = [
    'view' => 'admin/security/security'
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
    'action' => 'preview'
];


/** End Posts routes */

$Route['dashboard/events'] = [
    'request' => 'dashboard/event',
    'action' => 'resource'
];



$Route['dashboard/user'] = [
    'request' => 'dashboard/user',
    'action' => 'resource'
];

$Route['dashboard/settings'] = [
    'request' => 'dashboard/settings',
    'action' => 'resource'
];


return $Route;
