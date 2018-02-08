<?php
/**
 * This will be responsible for domain events and routing of the website application
 */

/**
 * Application main router function.
 * This function will direct the traffic of the web app and do
 * specific function based on the user request
 *
 * @param $uri
 * @return mixed
 * @throws exception
 */
function direct_route( $uri ){

    //Format the requested URI
    $request_uri = route_uri( $uri );

    //Build Route list
    $route_collection = route_collection();

    //Validate Requested Route
    if( ! route_validator( $request_uri, $route_collection) ){
        return view_error( '404' );
    }

    //Authenticate route to controller using middleware

    //Parse Route views

    //Parse Route actions


}


//---------------------------------------------------------------

/**
 * Return a formatted route to be used in the main function
 *
 * @param $uri
 * @return mixed|string
 */
function route_uri( $uri ){
    // Initialize Route Requirements

    $config = require CONFIGPATH . '/config.php';
    $base_url = "/{$config['APP_BASE_URL']}";

    // add base URI
    if( route_is_self_served() ){
        $uri = "/{$base_url}{$uri}";
    }

    // Clean URI before processing
    return clean_uri( $uri, $base_url );
}

function route_validator( $request_uri, $route_collection ){

    $routes_regex = route_replace_regex( $route_collection );


    foreach ($routes_regex as $regex ){

        if( preg_match( "/{$regex}/", $request_uri )){
            echo $regex."<br />";
        }

    }



    return true;
}

function route_replace_regex( $route_collection ){

    $allRoutes = $route_collection;

    $regRoute = [];

    foreach( $allRoutes as $route => $value ){

        $regex = str_replace("/", '\/', $route);
        $regex = preg_replace("/\{.*?\}/", '.*?', $regex);

        $regRoute[] = $regex;


    }

    return $regRoute;


}


/**
 * Add all routes to lists and return a collection of all routes
 *
 * @return array
 */
function route_collection(){
    $routes = require ROUTESPATH .'/route.php';
    $resources = [
        'store', 'create', 'destroy', 'show', 'update', 'edit'
    ];
    $allRoutes = [];



    foreach ( $routes as $key => $value ){

        //Check index level if it already contains a parameter,
        //If it doesn't contain any, pass a string with and index action,
        //else create an array with and index action and the parameters.
        if( ! preg_match_all( '/\{.*?\}/', $key ) ){
            $allRoutes[ $key ] = 'index';
        }else{
            $allRoutes[ $key ] = [

                'action' => 'index',
                'params' => route_add_params( $key )

            ];
        }


        //Check all of the routes if they are a resource route,
        //If they are a resource route start building the new URI
        //With the action and parameters.

        if( array_key_exists( 'action', $value ) ){
            if( $value[ 'action' ] == 'resource'){
                foreach( $resources as $resource){
                    if( $resource == 'create' ){
                        $allRoutes[ $key.'/create' ] = [
                            "action" => $resource

                        ];
                    }
                    elseif ( $resource == 'edit'){
                        $allRoutes[ $key.'/{resource}/edit' ] = [
                            'action' => $resource,
                            'params' => route_add_params( $key.'/{resource}/edit' )
                        ];


                    }
                    else{
                        $allRoutes[ $key.'/{resource}' ] = [
                            'action' => $resource,
                            'params' => route_add_params( $key.'/{resource}/edit' )
                        ];
                    }
                }// End Foreach
            }// End if
        }//End if
    }// End Foreach

    return $allRoutes;
}

function route_is_match(){

}

function route_run_request_action(){

}

/**
 * Function to get Parameters from a given Route
 *
 * @param $path
 * @return array
 */
function route_add_params( $path ){
    $params = [];

    preg_match_all( '/\{.*?\}/', $path, $matches );

    foreach( $matches as $key => $match){
        foreach($match as $value){

            $params[] =  str_replace( ['{','}'], '', $value );


        }
    }

    return $params;
}

//---------------------------------------------------------------


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

/**
 * Check if URI has a requested action
 *
 * @return bool
 */
function route_has_requested_action(){

    if( isset($_GET['action']) || isset($_GET['id'])){

        return true;
    }
    return false;
}

function route_has_request_file( $route ){

    if( array_key_exists( 'request', $route)){
        return true;
    }
    else{
        return false;
    }

}

function route_has_view( $route ){

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
function route_is_self_served(){

    $port = $_SERVER['SERVER_PORT'];

    if($port <> '80'){
        return true;
    }

    return false;

}