<?php

/**
 * Authenticate the user
 *
 * @return bool|mixed
 * @throws exception
 */
function auth(){
    if( !isset($_POST) ){
        redirect( route( 'login' ) );
    }

    $result = auth_login( $_POST['username'], $_POST['password']);

    if( $result === true ){

        redirect( 'dashboard' );
        return true;

    }


    //ERRORS

    $alert = [
        'alertable' => 'danger',
        'message' => 'Login Failed, ' . ($result <> "")? $result : "Wrong Username or Password"
    ];

    return view( 'frontend/login/login', compact( 'alert' ) ) ;

}

/**
 * Destroy Session
 */
function logout(){

    auth_logout();

}