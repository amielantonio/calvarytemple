<?php

/**
 * Web application Router. This is where all protocols will be located
 */


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
$Route['blog'] = [
    'endpoint' => 'public',
    'view' => 'blog/blog'
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
    'method' => 'resource'
];

$Route['dashboard/reservation'] = [
    'endpoint' => 'admin',
    'view' => 'reservation/reservation',
    'request' => 'dashboard/dashboard',
    'resource' => true
];

$Route['dashboard/reservation/categories'] = [
    'endpoint' => 'admin',
    'view' => 'reservation/reservation_categories',
    'request' => 'dashboard/dashboard',
    'resource' => true
];




$Route['dashboard/reservation'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'resource' => true
];
$Route['dashboard/reservation'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'resource' => true
];
$Route['dashboard/reservation'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'resource' => true
];
$Route['dashboard/reservation'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'resource' => true
];


return $Route;
