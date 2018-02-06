<?php
/**
 * This will be responsible for domain events and routing of the website application
 */

/**
 * Application main router function.
 * This function will direct the traffic of the web app and do
 * specific function based on the user request
 *
 *
 *
 * Todo: add middleware if middleware config in the $Route is specified
 * or if accessing admin side auth.
 *
 * @param $uri
 * @return mixed
 * @throws exception
 */
function direct_route( $uri ){

    // Get config

    $config = require CONFIGPATH . '/config.php';
    $base_url = $config['APP_BASE_URL'];
    $home_dir = '/'. $base_url;

    // Get Routes
    $routes = require ROUTESPATH .'/route.php';

    // add base URI
    if( is_self_served() ){
        $uri = '/'. $base_url .$uri;
    }

    // Clean URI before processing
    $uri = clean_uri( $uri, $home_dir );

    // Verify if requested URI exists
    if( ! verify_routes( $uri, $routes )){
        return view_error('404');
    }

    // Save current Route Information to a variable
    $currentRoute = $routes[ $uri ];

    if( has_request_file( $currentRoute ) ){
        if( file_exists( REQUESTPATH . '/' . $currentRoute['request'] . '.request.php' )){
            include REQUESTPATH . '/' . $currentRoute['request'] . '.request.php';

//            run_control_index();
        }
        // Assumes there is an index function in the request class;
    }

    // check if there is a request action
    if( !has_requested_action() &&  has_view( $currentRoute )) {
        return view( $currentRoute['view'] );
    }



    // Run requested action
    run_control_function();




}

/**
 * Clean URI for usage along the direct_control pipeline
 *
 * @param $uri
 * @param $home_dir
 * @return mixed|string
 */
function clean_uri( $uri, $home_dir ){
    $uri = str_replace( $home_dir.'/',"",  $uri);

    //  Check if URI is the home page
    if( $uri == ''){
        $uri = "/";
    }

    return $uri;
}

/**
 * Verify that the routing exist
 *
 * @param $uri
 * @param $routes
 * @return bool
 */
function verify_routes( $uri, $routes ){


    // Add Routing key to an array
    $routes = array_keys( $routes );


    // Verify across all keys in the routes array
    // if the requested URI exists
    foreach( $routes as $key =>$value ){

        if( preg_match( "@".$uri."@", $value)  ){
            return true;
        }

    }

    return false;
}

/**
 * Check if URI has a requested action
 *
 * @return bool
 */
function has_requested_action(){

    if( isset($_GET['action']) || isset($_GET['id'])){

        return true;
    }
    return false;
}

function has_request_file( $route ){

    if( array_key_exists( 'request', $route)){
        return true;
    }
    else{
        return false;
    }

}

function has_view( $route ){

    if( array_key_exists( 'view', $route)){
        return true;
    }
    else{
        return false;
    }

}

/**
 * To accommodate sites that uses localhost of XAMPP or virtual host
 *
 * @return bool
 */
function is_self_served(){

    $port = $_SERVER['SERVER_PORT'];

    if($port <> '80'){
        return true;
    }

    return false;

}