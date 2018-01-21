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
 * Check if current URI is home page
 *
 * @return bool
 */
function is_home(){

    $url = require CONFIGPATH . '/config.php';

    $url = $url['APP_BASE_URL'];

    $request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    if( $url == $request){
        return true;
    }

    return false;
}

function is_page( $page ){



}

/**
 * Returns the view
 *
 * @param $endpoint
 * @param $view
 * @return mixed
 * @throws exception
 */
function view($endpoint, $view){

    if(!file_exists( BASEPATH.'/'.$endpoint . '/views/' . $view . '.view.php' )){
        throw new exception('No View');
    }
    return require BASEPATH.'/'.$endpoint . '/views/' . $view . '.view.php';
}

/**
 * Return a View
 *
 * @param $error
 * @return mixed
 * @throws exception
 */
function view_error($error){

    if( !file_exists( BASEPATH.'/public/error/' . $error . '.view.php' )){
        throw new exception('No View Error');
    }

    return require BASEPATH.'/public/error/' . $error . '.view.php';
}

/**
 * Return a template within the current layout
 *
 * @param $endpoint
 * @param $partialView
 * @return mixed
 * @throws exception
 */
function view_partial($endpoint, $partialView){

    $partial = 'template/'. $partialView;

    if(! file_exists($endpoint. $partial . '.view.php')){
        throw new exception( 'No View' );
    }

    return include $endpoint. $partial . '.view.php';
}