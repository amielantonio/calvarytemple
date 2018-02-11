<?php

/**
 * Responsible for control functions of the web app
 */


/**
 * Controller method to run an on_load function of
 * of a request class
 *
 * @return bool
 */


/**
 * Run the Action that was requested
 *
 * @param $request
 * @param string $action
 * @param $params
 * @return bool
 */
function request_runAction( $request, $action="", $params = [] ){
    include REQUESTPATH . "/{$request}.request.php";

    return request_parseAction( $action, $params ) ? true : false;

}

/**
 * Check if the action requested is callable
 *
 * @param string $action
 * @param array $params
 * @return bool
 */
function request_parseAction( $action="", $params = [] ){

    $func = get_defined_functions()['user'];

    if( in_array( $action, $func)){

        if( $action == 'index'){

            $action();

        }else{

            ( !empty( $params )) ? $action( implode( ', ', $params ) ) : $action();

        }

        return true;
    }

    return false;
}


