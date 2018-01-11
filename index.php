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

require BASEPATH . '/app/loader/loader.php';


