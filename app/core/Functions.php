<?php

/**
 * ------------------------------------------------------------
 * Application Functions
 * ------------------------------------------------------------
 *
 * This file contains application functions that will be using
 * through out the database
 */

/**
 * Get Public header
 */
function get_header(){
   return include PUBLICPATH. '/includes/header.php';
}

/**
 * Get Public footer
 */
function get_footer(){
    return include PUBLICPATH. '/includes/footer.php';
}

/**
 * Get Public Sidebar
 */
function get_sidebar(){
    return include PUBLICPATH. '/includes/sidebar.php';
}

/**
 * Get Public Navigation
 *
 * @return mixed
 */
function get_nav(){
    return include PUBLICPATH. '/includes/nav.php';
}

/**
 * Return base url of admin
 *
 * @return string
 */
function admin_base_url(){
    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_HOST'] . $base_url['APP_BASE_URL'];

    $route = $base_url.'/dashboard';


    return $route;
}


function direct_admin_url( $url='' ){
    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_HOST'] . $base_url['APP_BASE_URL'];

    if( $url <> '' ){
        $url = '/'.$url;
    }

    $route = $base_url.'/dashboard' . $url;

    return $route;
}

/**
 * Return base url of frontend
 *
 * @return string
 */
function public_base_url(){

    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_HOST'] . $base_url['APP_BASE_URL'];

    $route = $base_url.'/';


    return $route;
}

/**
 * Return URI string for accessing public pages
 *
 * @param string $url
 * @return string
 */
function direct_public_url( $url = ''){

    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_HOST'] . $base_url['APP_BASE_URL'];

    $route = $base_url.'/' . $url;

    return $route;

}

/**
 * Return base url of resources folder
 *
 * @return string
 */
function resource_dir(){
    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_BASE_URL'];

    $route = '/'.$base_url.'/resources';

    //Return route
    return $route;
}

/**
 * Get admin header
 *
 * @return mixed
 */
function admin_get_header(){
    return include ADMINPATH . '/includes/header.php';
}

/**
 *  Get admin navigation
 *
 * @return mixed
 */
function admin_get_nav(){
    return include ADMINPATH . '/includes/nav.php';
}

/**
 * Get Admin Footer
 *
 * @return mixed
 */
function admin_get_footer(){
    return include ADMINPATH . '/includes/footer.php';
}


/**
 * Get admin Sidebar
 *
 * @return mixed
 */
function admin_get_sidebar(){
    return include ADMINPATH . '/includes/sidebar.php';
}


/**
 * Check if the current URI is the home page
 *
 */
function is_home(){

}