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
function auth_login( $username, $password ){

    $salt = auth_get_salt( $username );

    $password = md5( $password.$salt[0]['salt'] );

    $where = "tbl_accounts.username = '{$username}' AND password = '{$password}'";

    $user = innerJoin(['users', 'accounts'], '', ['username', 'username'], $where);

    //Add Session to user
    auth_addUserSession( $user );

    // Return if user is logged in
    return empty($user) ? false : true;

}

function auth_logout(){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    //Redirect to Login Route
    redirect( 'login' );
}


function auth_user(){

    return $_SESSION['calvary_sessioned_user']['username'];

}

/**
 * Get Salt from username
 *
 * @param $user
 * @return mixed
 */
function auth_get_salt( $user ){

    $where = "username = '{$user}'";


    $salt = where('accounts', $where);

    return $salt;

}

/**
 * Return the access level of a user
 *
 * @param string $user
 * @return string
 */
function auth_access_level( $user = ""  ){
    $access = "";

	return $access;
}

/**
 * Return the Authorization of the current logged in user if it's an admin
 *
 * @return string
 */
function auth_is_admin(){
    $is_admin = "";

    return $is_admin;
}


/**
 * Return the Authorization of the current logged in user if it's an author
 *
 * @return string
 */
function auth_is_author(){
    $is_author = "";


    return $is_author;
}


/**
 * Get the settings of the current logged in user
 *
 * @return string
 */
function auth_user_settings(){
	$settings = "";


	return $settings;
}

/**
 * Get the ID of the current logged in user
 *
 * @param string $user
 * @return string
 */
function auth_user_id( $user="" ){

    $id = "";


    return $id;
}


/** helper functions*/

function auth_addUserSession( $user = [] ){

    if( empty( $user ) ){
        return false;
    }
    session_start();

    $_SESSION['calvary_sessioned_user'] = $user;

}

