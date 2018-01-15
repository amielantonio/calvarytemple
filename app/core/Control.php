<?php
/**
 * This will be responsible for domain events and routing of the website application
 */


//function control_get($uri, $endpoint, $dir, $requestClass = '')
//{
//    /**
//     * Check request method
//     */
//    if( $_SERVER['REQUEST_METHOD'] <> "GET"){
//        exit;
//    }
//    /**
//     * Get config base url
//     */
//
//    $config = require CONFIGPATH . '/config.php';
//    $base_url = $config['APP_BASE_URL'];
//
//    /**
//     * Instantiate variables
//     */
//    $thisEndpoint = endpoint_check($endpoint);
//    $thisURI = $base_url.'/' . trim($uri, '/');
//    $thisCurrentURI = current_uri();
//
//    /**
//     * parse base uri
//     */
//    if( $base_url == $thisCurrentURI){
//        $thisCurrentURI = $thisCurrentURI.'/';
//    }
//
//    /**
//     * Compare URI
//     */
//    if($thisURI == $thisCurrentURI){
//        /**
//         * Check if the view has functionalities included
//         */
//        if( $requestClass <> ''){
//            require REQUESTPATH . '/' . $requestClass . '.requests.php';
//        }
//
//        if( $endpoint == 'admin'){
//            require COREPATH . '/Auth.php';
//        }
//
//        /**
//         * show view
//         */
//        return view($thisEndpoint, $dir);
//
//    }
//    return '';
//
//}

/**
 * Function for control get method
 *
 * @param $uri                  - request URI
 * @param $endpoint             - endpoints for the project folder [ADMIN, PUBLIC]
 * @param $view                 - view location
 * @param string $request       - process request class
 * @param string $middleware    - authentication for view
 * @throws exception
 * @return mixed
 */

function control_get( $uri, $endpoint, $view, $request = "", $middleware = "" )
{


    /** Check request method */
    if ($_SERVER['REQUEST_METHOD'] <> "GET") {
        throw new exception('Invalid Request Type');
    }

    /** verify the request and current URI */
//    if (!verify_uri($uri)) {
//        throw new exception('Invalid Route');
//    }

    echo $uri."<br />";

    echo $_SERVER['REQUEST_URI']."<br />";

    /** Process for getting the view */


    return "";

}


function control_request($uri, $endpoint, $dir)
{


    
    
}

/**
 * Check endpoint if the view is in the public directory
 * or if it's in the admin directory
 *
 * @param $endpoint
 * @return string
 */

function direct_endpoint( $endpoint ){
    if($endpoint == 'public'){
        return PUBLICPATH . '/views/';
    }
    if($endpoint == 'admin'){
        return ADMINPATH . '/views/';
    }

    // if other endpoint is specified, return a wildcard  endpoint folder
    return BASEPATH . '/' . $endpoint . '/views';
}

/**
 * Get current URI
 *
 * @return string
 */
function get_current_uri(){

    $current_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

    return $current_uri;
}

/**
 * Check requested URI with the current URI
 *
 * @param $requested_uri
 * @return bool
 */

function verify_uri( $requested_uri ){

//    $current_uri = $current_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
//
//    if( $current_uri == $requested_uri ){
//        return true;
//    }
//
//    return false;


//    echo $requested_uri;


}