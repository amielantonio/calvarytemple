<?php
/**
* Authentication
* 
* Responsible for checking all authentication
* and user process
*/


/**
 * Check if the user can login
 *
 * @param $username
 * @param $password
 * @return bool
 */
function login( $username, $password ){

    $where = "username = {$username} AND password = {$password}";

    $user = where( 'users', $where );

    return empty($user) ? false : true;

}

function auth( $user ){
	
}

function current_user(){

    return $_SESSION['calvary_sessioned_user'];
}

function access_level( $user=""  ){


	
}

function is_admin( $user="" ){

}

function is_author( $user="" ){

}

function user_settings( $user="" ){
	
}

function user_id( $user="" ){

}


/** helper functions*/

function add_user_session( $user = [] ){

    if( empty( $user ) ){
        return false;
    }

    $_SESSION['calvary_sessioned_user'] = $user;

}

