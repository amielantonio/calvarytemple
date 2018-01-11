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



