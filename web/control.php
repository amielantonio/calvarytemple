<?php

/**
 * Web application Router. This is where all protocols will be located
 */




/**
 * Public Router
 */

//control_get( '/', 'public', 'home/home' );
//control_get( 'about', 'public', 'home/about' );
//control_get( 'blog', 'public', 'home/about' );
//control_get( 'events', 'public', 'home/about' );
//control_get( 'reservations', 'public', 'home/about' );
//control_get( 'login', 'public', 'login/login' );
//
//
///**
// * Admin Router
// */
//
//control_get( 'dashboard', 'admin', 'dashboard/dashboard' );
//
///** Reservation Router */
//control_get( 'dashboard/reservation', 'admin', 'reservation/all_reservation' );
//
///** Security Router */
//control_get( 'dashboard/security', 'admin', 'dashboard/security' );
//
///** Events Router */
//control_get( 'dashboard/events', 'admin', 'events/events' );
//
///** Blog Router */
//control_get( 'dashboard/blog', 'admin', 'blog/blog' );
//
///** User Router */
//control_get( 'dashboard/user', 'admin', 'user/user');
//
///** Settings Router */
//control_get( 'dashboard/settings', 'admin', 'dashboard/settings');
//


$Route['/'] = [
    'endpoints' => 'public',
    'view' => 'home/home',
];

$Route['about'] = [
    'endpoints' => 'public',
    'view' => 'home/about',
];

return $Route;
