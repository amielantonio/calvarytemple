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
    'method' => 'resource'
];
$Route['about'] = [
    'endpoint' => 'public',
    'view' => 'home/about',
];
$Route['blog'] = [
    'endpoint' => '',
    'view' => 'blog/blog'
];
$Route['events'] = [
    'endpoint' => '',
    'view' => 'events/events'
];
$Route['reservations'] = [
    'endpoint' => '',
    'view' => 'home/reservations'
];
$Route['login'] = [
    'endpoint' => '',
    'view' => 'login/login'
];
$Route['track'] = [
    'endpoint' => '',
    'view' => 'home/home'
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
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'method' => 'resource'
];
$Route['dashboard'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',

    'method' => 'resource'
];
$Route['dashboard'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',

    'request' => 'dashboard/dashboard',
    'method' => 'resource'
];
$Route['dashboard'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'method' => 'resource'
];
$Route['dashboard'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'method' => 'resource'
];
$Route['dashboard'] = [
    'endpoint' => 'admin',
    'view' => 'dashboard/dashboard',
    'request' => 'dashboard/dashboard',
    'method' => 'resource'
];


return $Route;
