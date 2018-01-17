<?php
/**
 * This will be responsible for domain events and routing of the website application
 */


function direct_control( $uri ){


    /**
     * Todo:
     * Check groupings
     */

    /** Get config */

    $config = require CONFIGPATH . '/config.php';
    $base_url = $config['APP_BASE_URL'];
    $home_dir = '/'. $base_url;

    /** Get controls */
    $controls = require ROUTESPATH .'/control.php';

    /**
     * if not Self serve
     * add base url
     */
    if( self_serve() ){
        $uri = '/'. $base_url .$uri;
    }

    /** Verify if requested URI exists */
    if( ! verify_routes( $uri, $controls, $home_dir )){
        return view_error('404');
    }


}


function process_route_key( $route ){

}


function is_resource( $uri ){
    
}


function verify_routes( $uri, $controls, $home_dir ){

    $uri = str_replace( $home_dir.'/',"",  $uri);

    /** Check if URI is the home page */
    if( $uri == ''){
        $uri = "/";
    }

    if( array_key_exists($uri, $controls )){
        return true;
    }
    return false;
}


/**
 * Check if the current application is being self served by the server
 *
 * @return bool
 */
function self_serve(){

    $port = $_SERVER['SERVER_PORT'];

    if($port <> '80'){
        return true;
    }

    return false;

}