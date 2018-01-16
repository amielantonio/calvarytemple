<?php

/**
 * Entry point of the application, loads the frontend of the website.
 */


if( ! defined('BASEPATH')){

    /**
     * Define the absolute path of the application
     */
    define( 'BASEPATH', dirname(__FILE__) );

    /**
     * Define the application path
     */

    define( 'APPPATH', dirname(__FILE__) . '/app');

}
/**
 * Start Loading the bootstrap file
 */
require BASEPATH . '/app/loader/loader.php';


/**
 * Pass Routing to Control.php
 */
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);


direct_control( $uri );