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

    // Initialize Route Requirements
    $config = require CONFIGPATH . '/config.php';
    $base_url = "/{$config['APP_BASE_URL']}";


    // add base URI
    if( is_self_served() ){
        $uri = "/{$base_url}{$uri}";
    }

    // Clean URI before processing
    $request_uri = clean_uri( $uri, $base_url );



    // Verify if requested URI exists
//    if( ! verify_routes( $request_uri )){
//        return view_error('404');
//    }
//
//    // Save current Route Information to a variable
//    $currentRoute = $routes[ $request_uri ];
//
//
//    echo $request_uri;


    echo verify_routes( $request_uri );




}

/**
 * Clean URI for usage along the direct_route pipeline
 *
 * @param $uri
 * @param $base_uri
 * @return mixed|string
 */
function clean_uri( $uri, $base_uri ){
    $uri = str_replace( $base_uri.'/',"",  $uri);

    //  Check if URI is the home page
    if( $uri == ''){
        $uri = "/";
    }

    return $uri;
}
//---------------------------------------------------------------

/**
 * Verify that the routing exist
 *
 * @param $uri
 * @param $routes
 * @return bool
 */
function verify_routes( $uri ){
    $routes = route_builder();

    // Add Routing key to an array
    $routes = array_keys( $routes );


//    $request_uri = preg_split("/[{_}]+/", $uri)[0];
//    $request_uri_count = count( $request_uri );

    echo 'url: '.$uri."<br />";


    // Verify across all keys in the routes array
    // if the requested URI exists
    foreach( $routes as $route ){

        // Return if root uri has been accepted
        if( $uri == $route ){
            return true;
        }

        $arrURI = explode( '/', $uri);
        $count = count($arrURI);
        $response = array_pop( $arrURI );
        $preg_route = implode('/', $arrURI);


        if( preg_match("@{$preg_route}@", $route) ){
            $resultRoute = explode('/', $route);
            if($count == count($resultRoute)){
                echo implode('/', $resultRoute)."<br />";
            }
        }

    }


    return false;
}

function route_channel( $routes ){



}

function route_builder(){

    $routes = require ROUTESPATH .'/route.php';

    $resources = [
        'store', 'create', 'destroy', 'show', 'update', 'edit'
    ];

    $route_list = [];

    foreach ( $routes as $key => $value ){

        $route_list[ $key ] = 'index';


        if( array_key_exists( 'action', $value ) ){
            if( $value[ 'action' ] == 'resource'){
                if( array_key_exists( 'action', $value ) ){

                    foreach( $resources as $resource){

                        if( $resource == 'create' ){
                            $route_list[ $key.'/create' ] = $resource;
                        }
                        elseif ( $resource == 'edit'){
                            $route_list[ $key.'/{resource}/edit' ] = $resource;
                        }
                        else{
                            $route_list[ $key.'/{resource}' ]= $resource;
                        }
                    }// End Foreach
                }// End if
            }// End if
        }


    }// End Foreach


    return $route_list;

}

//---------------------------------------------------------------

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