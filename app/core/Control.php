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
function run_control_index(){
    $func = get_defined_functions()['user'];


    if( in_array( 'index', $func)){
        index();
        return true;
    }

    return false;
}

/**
 * Controller method to run a specific function
 *
 * @return bool
 */
function run_control_function(){


    if( isset($_GET['action'])){
        $action = $_GET['action'];

        $func = get_defined_functions()['user'];

        if( in_array( $action, $func)){

            $action();
            return true;
        }
    }

    //If no action requested, run index
    index();
    return false;
}