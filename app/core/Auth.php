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

    if( empty($salt) ){

        return "No User";
    }

    $password = !empty($salt)? md5( $password.$salt[0]['salt'] ) : "";

    $where = "tbl_accounts.username = '{$username}' AND password = '{$password}'";

    $user = innerJoin(['users', 'accounts'], '', ['username', 'username'], $where);

    //Add Session to user
    auth_addUserSession( $user );

    // Return if user is logged in
    return empty($user) ? false : true;

}

/**
 * Destroy the current session
 */
function auth_logout(){
    // remove all session variables

    session_start();

    $_SESSION = array();
    session_unset();


    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }


    // destroy the session
    session_destroy();

    //Redirect to Login Route
    redirect( route( 'login' ) );
}


/**
 * Check if there is a user logged in;
 *
 * @return bool
 */
function authenticate(){
//    $user = auth_user();
//
//    return !empty( $user ) ? true : false ;

    return true;

}

/**
 * Return the current user
 *
 * @return mixed
 */
function auth_user()
{

    $user = $_SESSION['calvary_sessioned_user'];


    return $user;

}
/**
 * Helper function to get Salt from specified username
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
function auth_getAccessLevel(){
    $access = auth_user()['access_level'];

	return $access;
}

/**
 * Return the Authorization of the current logged in user if it's an admin
 *
 * @return string
 */
function auth_is_admin(){
    $is_admin = auth_user()['access_level'];


    return $is_admin == 'admin' ? true : false;
}


/**
 * Return the Authorization of the current logged in user if it's an author
 *
 * @return string
 */
function auth_is_author(){
    $is_author = auth_user()['access_level'];


    return $is_author == 'author' ? true : false;
}

/**
 * Get the username of the current logged in user
 *
 * @return mixed
 */
function auth_getUsername(){
    $username = auth_user()['username'];

    return $username;
}

/**
 * Get the ID of the current logged in user
 *
 * @return string
 */
function auth_getUserId(){


    $user = auth_user();

    return $user['id'];
}


/** helper functions*/
/**
 * Add user to session
 *
 * @param array $user
 * @return bool
 */
function auth_addUserSession( $user = [] ){

    if( empty( $user ) ){
        return false;
    }

    session_start();

    $_SESSION['calvary_sessioned_user'] = $user['0'];

    return true;

}

