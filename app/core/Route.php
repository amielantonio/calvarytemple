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

    $valid_route = route_validator( $request_uri, $route_collection);

    //Validate Requested Route
    if( $valid_route == false ){
        return view_error( '404' );
    }

    //Authenticate route to controller using middleware
    // TODO: middleware

    //Check if there is a view already available in the routes directory
    if( route_hasView( $valid_route )){
        return view( $valid_route['view'] );
    }


    //If no view, check if there is a request file.
    if( route_hasRequestFile( $valid_route ) ){

        //Pass Action
        $action = isset( $valid_route['action'] ) ? $valid_route['action'] : "index" ;

        //Get action parameters.
        $params = route_parameterBinding( $request_uri, $valid_route['regex'] );

        //Parse Route actions
        request_runAction( $valid_route['request'], $action, $params );
        return true;
    }

    if( ! route_hasEcho( $valid_route )){
        return view_error( '501' );
    }

    echo $valid_route['echo'];
    return true;
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


/**
 * Validate if the Request URI is within the routes file
 *
 * @param $request_uri
 * @param $route_collection
 * @return bool
 * @throws Exception
 */
function route_validator( $request_uri, $route_collection ){

    $routes_regex = route_replaceRegex( $route_collection );


    $match = [];
    foreach ($routes_regex as $regex ){

        if( preg_match( "/^{$regex}$/", $request_uri )){

            $match[] = $regex;

        }

    }

    return route_match( $match );


}

/**
 * Return the information of the matching array
 *
 * @param $params
 * @return mixed
 */
function route_get( $params ){

    //Create haystack
    $route_list = route_collection();

    //Create needle
    $needle = str_replace( '[a-zA-Z0-9-]*', '{[a-zA-Z0-9-]*}', $params);

    $requested_route = [];

    //Search in
    foreach( $route_list as $key => $value ){

        if( preg_match( "/^{$needle}$/", $key )){

            $requested_route[] = $value;

            $requested_route['0']['regex'] = $key;

        }// End if

    }// End foreach

    return $requested_route[0];
}

/**
 * Replace the route list to a regular expression routes
 *
 * @param $route_collection
 * @return array
 */
function route_replaceRegex( $route_collection ){

    $allRoutes = $route_collection;

    $regRoute = [];

    foreach( $allRoutes as $route => $value ){

        $regex = str_replace("/", '\/', $route);
        $regex = preg_replace("/\{[a-zA-Z0-9-]*\}/", '[a-zA-Z0-9-]*', $regex);

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
        'index', 'store', 'create', 'destroy', 'show', 'update', 'edit'
    ];
    $allRoutes = [];

    foreach ( $routes as $key => $value ){


        $allRoutes[ $key ] = $value;

        //Check index level if it already contains some parameter,
        //add it to the Array

        if( preg_match_all( '/\{.*?\}/', $key ) ){
            $allRoutes[ $key ]['params'] = route_addParams( $key );
        }


        // Check if the route contains an action
        if( array_key_exists( 'action', $value ) ){


            //Check all of the routes if they are a resource route,
            //If they are a resource route start building the new URI
            //With the action and parameters.
            if( $value[ 'action' ] == 'resource' ){
                foreach( $resources as $resource){
                    switch ( $resource ) {

                        case 'index' :

                            $allRoutes[ $key ][ 'action' ] = 'index';
                            break;

                        case 'create' :

                            $allRoutes[ $key.'/create' ] = [
                                "action" => $resource,
                                "request" => $value[ 'request' ]

                            ];
                            break;

                        case 'destroy' :

                            $allRoutes[ $key.'/{resource}/destroy' ] = [
                                'action' => $resource,
                                'params' => route_addParams( $key.'/{resource}' ),
                                "request" => $value[ 'request' ]
                            ];
                            break;

                        case 'show' :

                            $allRoutes[ $key.'/{resource}' ] = [
                                'action' => $resource,
                                'params' => route_addParams( $key.'/{resource}' ),
                                "request" => $value[ 'request' ]
                            ];
                            break;

                        case 'update' :

                            $allRoutes[ $key.'/{resource}/update' ] = [
                                'action' => $resource,
                                'params' => route_addParams( $key.'/{resource}' ),
                                "request" => $value[ 'request' ]
                            ];
                            break;

                        case 'edit' :

                            $allRoutes[ $key.'/{resource}/edit' ] = [
                                'action' => $resource,
                                'params' => route_addParams(  $key.'/{resource}' ),
                                "request" => $value[ 'request' ]
                            ];
                            break;

                    }// End Switch

                }// End Foreach


                //If there is an action but its a resource route
            } elseif( $value[ 'action' ] <> "resource" ) {

                //Add the Action for a non-resource routes
                $allRoutes[ $key ]['action'] = $value[ 'action' ];

            }// End if
        }//End if
    }// End Foreach

    return $allRoutes;
}

/**
 * @param $match
 * @return mixed
 */
function route_match( $match ){

    if( count($match) > 1 ){

        //Just return the last route.
        //TODO: need to further investigate on this behaviour, might cause a problem in the future.
        return route_get( $match[ count($match) - 1 ] );

    }

    return route_get( $match[0] );


}

/**
 * Function to get Parameters from a given Route
 *
 * @param $path
 * @return array
 */
function route_addParams( $path ){
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

function route_parameterBinding( $request_uri, $route_regex ){

    $request = explode('/', $request_uri );
    $validity = explode('/', $route_regex );

    $result = array_diff( $request, $validity );

    return $result;

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
 * Check fi the Request File has a view method
 *
 * @param $route
 * @return bool
 */
function route_hasRequestFile( $route ){

    return array_key_exists( 'request', $route ) ? true : false;

}

/**
 * Check if the Route has a view method
 *
 * @param $route
 * @return bool
 */
function route_hasView( $route ){

    return array_key_exists( 'view', $route ) ? true : false;

}

/**
 * Check if the Route has an Echo Method
 *
 * @param $route
 * @return bool
 */
function route_hasEcho( $route ){

    return array_key_exists( 'echo', $route ) ? true : false;

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


