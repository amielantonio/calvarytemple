<?php
/**
 * This will be responsible for domain events and routing of the website application
 */


function direct_control( $uri ){


    /**
     * Todo:
     * Get controls
     * check URI if available, else return error 404;
     * check what endpoint, if admin, automatically append auth::middleware
     * if URI available check if middleware key exists, append;
     * check if Requests key exists, append;
     * check if view exists, return;
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
        require BASEPATH.'/public/error/404.view.php';
    }

    return view('public', 'home/about');




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

/**
 * Check endpoint if the view is in the public directory
 * or if it's in the admin directory
 *
 * @param $endpoint
 * @return string
 */
function endpoint_check($endpoint)
{
    if($endpoint == 'public'){
        return PUBLICPATH . '/views/';
    }
    if($endpoint == 'admin'){
        return ADMINPATH . '/views/';
    }
}