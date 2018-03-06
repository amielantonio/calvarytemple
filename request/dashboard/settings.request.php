<?php


/**
 * Show the landing page for the settings
 *
 * @return mixed
 * @throws exception
 */
function index(){

    $settings = where( 'settings', "id = 1");


    return view( 'admin/dashboard/settings' , compact( 'settings' ));
}

/**
 * Store or updates the settings of the Web application
 *
 * @return bool
 */
function store(){

    $data = [

        'sms_key' => $_POST['sms_key'],
        'phone_number' => $_POST['phone_number'],
        'notification_message' => $_POST['notification_message'],
        'approved_message' => $_POST['approved_message'],
        'declined_message' => $_POST['declined_message']

    ];


    updateOrCreate( 'settings', $data, "id = 1" );

    redirect( route( 'dashboard/settings' ) );

    return true;

}