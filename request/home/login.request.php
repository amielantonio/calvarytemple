<?php

/**
 * Authenticate the user
 *
 * @return mixed
 */
function auth(){
    if( !isset($_POST) ){
        redirect( route( 'login' ) );
    }


    if( ! auth_login( $_POST['username'], $_POST['password'])){


        $alert = [
            'alertable' => 'danger',
            'message' => 'Login Failed, '
        ];

        return view( 'frontend/login/login', compact( 'alert' ) ) ;
    }

    redirect( 'dashboard' );
}