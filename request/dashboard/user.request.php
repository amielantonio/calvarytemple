<?php


/**
 * Show index page
 *
 * @return mixed
 * @throws exception
 */
function index(){

    $users = innerJoin(['users', 'accounts'], '', ['username', 'username']);

    return view( 'admin/user/user', compact( 'users' ) );
}


/**
 * Show a form for creating a User resource
 *
 * @return mixed
 * @throws exception
 */
function create(){

    return view( 'admin/user/add_user' );
}

/**
 * Store user to database
 *
 * @return bool|mixed
 * @throws exception
 */
function store(){

    if($_POST['username'] <> $_POST['username'] ){

        $alert = [

        ];

        return view( 'dashboard/user/create', compact( 'alert' ) );

    }

    // INSERT TO ACCOUNTS TABLE
    $salt = date( 'Y-m-d h:i:s' );


    $accounts = [

        'username'      => $_POST['username'],
        'password'      => md5( $_POST['password'].$salt ),
        'salt'          => $salt,
        'access_level'  => $_POST['access_level'],
        'created_at'    => date( 'Y-m-d h:i:s' ),
        'updated_at'    => date( 'Y-m-d h:i:s' ),

    ];



    if( ! insert( 'accounts', $accounts )  ){
        $alert = [

        ];

        return view( 'dashboard/user/create', compact( 'alert' ) );
    }


    // INSERT TO USERS TABLE
    $user = [

        'username'      => $_POST['username'],
        'firstname'         => $_POST['firstname'],
        'middlename'        => $_POST['middlename'],
        'lastname'          => $_POST['lastname'],
        'date_of_birth'     => date( 'Y-m-d', strtotime($_POST['date_of_birth']) ),
        'email'             => $_POST['email'],
        'phone_number'      => $_POST['phone_number'],
        'created_at'        => date( 'Y-m-d h:i:s' ),
        'updated_at'        => date( 'Y-m-d h:i:s' ),

    ];

    if( ! insert( 'users', $user )  ){
        $alert = [

        ];

        return view( 'dashboard/user/create', compact( 'alert' ) );
    }


    redirect( route( 'dashboard/user' ) );

}