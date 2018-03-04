<?php

/**
 * Return security index
 *
 * @return mixed
 * @throws exception
 */
function index(){


    return view( 'admin/security/security' );
}

/**
 * Connect to WebRTC
 *
 * @return mixed
 * @throws exception
 */
function connect(){

    // Check whether there is a passed variable
    if( !isset($_POST) && empty( $_POST) ){
        redirect( route( 'dashboard/security' ) );
    }

    $password = $_POST['password'];

    if( $password <> 'dev101'){
        redirect( route( 'dashboard/security?message=1' ) );
    }

    return view( 'admin/security/security', compact( 'password' ) );
}