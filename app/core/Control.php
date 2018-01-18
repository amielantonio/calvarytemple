<?php
/**
 * This will be responsible for domain events and routing of the website application
 */


function direct_control( $uri ){


    /**
     * Todo:
     * check if URI is resource URI
     *
     *
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


    return"";
}


function process_route_key( $route ){


    return "";
}


function is_resource_route( $route ){

}


/**
 * Verify that the routing exist
 *
 * @param $uri
 * @param $controls
 * @param $home_dir
 * @return bool
 */
function verify_routes( $uri, $controls, $home_dir ){

    $uri = str_replace( $home_dir.'/',"",  $uri);

    /** Check if URI is the home page */
    if( $uri == ''){
        $uri = "/";
    }

    /** Add Routing key to an array */
    $routes = array_keys( $controls );

    echo $uri;

    /** Process array */
//    foreach( $routes as $key =>$value ){
//
//        if( preg_match( "@".$uri."@", $value)  ){
//            return true;
//        }
//
//    }
//
//    return false;
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