<?php

/**
 * Web application Router. This is where all protocols will be located
 */




/**
 * Public Router
 */

control_get('/', 'public', 'home/home');
control_get('about', 'public', 'home/about');
control_get('login', 'public', 'login/login');




/**
 * Admin Router
 */

control_get('dashboard', 'admin', 'dashboard/dashboard');


/** Reservation Router */
control_get('dashboard/reservation', 'admin', 'reservation/all_reservation');