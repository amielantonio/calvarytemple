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
$Route['reservationpublics'] = [
    'endpoint' => '',
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
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'resource' => true
];

$Route['dashboard/reservation'] = [
    'endpoint' => 'admin',
    'view' => 'reservation/reservation',
    'request' => 'dashboard/reservation',
    'resource' => true
];
$Route['dashboard/reservation/pending'] = [
    'endpoint' => 'admin',
    'view' => 'reservation/reservation',
    'request' => 'dashboard/reservation',
    'resource' => true
];

$Route['dashboard/reservation/categories'] = [
    'endpoint' => 'admin',
    'view' => 'reservation/reservation_categories',
    'request' => 'dashboard/dashboard',
    'resource' => true
];

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
$Route['dashboard/post'] = [
    'endpoint' => 'admin',
    'view' => 'post/post',
    'request' => 'dashboard/post',
    'resource' => true
];
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
