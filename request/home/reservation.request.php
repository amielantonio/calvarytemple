<?php


/**
 * Show index page for Frontend Reservation
 *
 * @return mixed
 * @throws exception
 */
function index(){

    $reservation_types = all('reservation_categories');

    return view( 'frontend/home/reservations', compact('reservation_types' ) );
}


/**
 */
function store(){

    //Redirect to reservations when a direct access was done without sending payloads
    if( !isset($_POST) ){
        redirect( 'reservations' );
    }

    date_default_timezone_set( 'Asia/Manila' );


    $buffer = '2 Hours';

    //INITIAL CHECKS
    if( $_POST['startTime'] < date( 'H:i:s', strtotime( '8:00 am' ) ) || $_POST['startTime'] > date( 'H:i:s', strtotime( '5:00 pm' ) ) ){
        redirect( route( 'reservations?alert=1' ) );
        return false;
    }


    $request_start = date( 'Y-m-d H:i:s', strtotime( $_POST['reservation_startdate']." ".$_POST['startTime'] ) );
    $duration = where( 'reservation_categories', "reservation_category = '{$_POST['reservation']}'")[0]['reservation_duration'];

    //Get End of Requested event
    $request_end = date_add(
        date_create( $request_start ),
        date_interval_create_from_date_string( $duration ));

    $request_end = date_format( $request_end, 'Y-m-d H:i:s' );
    //END

    $request_buffered = date_sub(
        date_create( $request_start ),
        date_interval_create_from_date_string( $buffer )
    );

    $request_buffered = date_format( $request_buffered, 'Y-m-d H:i:s' );


    $first_check = where( 'reservations', "'{$request_buffered}' < reservation_enddate  AND reservation_enddate < '{$request_end}'" );


    if( !empty( $first_check )){

        redirect( route( 'reservations?alert=1' ) );
        return false;
    }

    $second_check = where( 'reservations', "'{$request_buffered}' < reservation_startdate  AND reservation_startdate < '{$request_end}'" );

    if( !empty( $second_check ) ){

        redirect( route( 'reservations?alert=1' ) );
        return false;
    }

    //END OF CHECKING,
    //ACTUAL RESERVATION STARTS HERE



    $data = [

        'reserver_name' => $_POST['reserver_name'],
        'reserver_contact' => $_POST['reserver_contact'],
        'reservation' => $_POST['reservation'],
        'reservation_startdate' => $request_start,
        'reservation_enddate' => $request_end,
        'facilitator' => $_POST['facilitator'],
        'reservation_status' => 'Pending',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),

    ];

    //START SMS
    $settings = get( 'settings', 1);

    if( !insert('reservations', $data ) ){
        redirect( route( 'reservations?alert=2' ) );
    }

    $number = $settings[0]['phone_number'];
    $message = $settings[0]['notification_message'];
    $apicode = $settings[0]['sms_key'];

    //Notify admin
    itexmo( $number, $message, $apicode );


    //Auto-reply
    $reply_message = "Thank you for reserving. We will notify you shortly about your reservation status. Thank you";
    itexmo( $_POST['reserver_contact'], $reply_message, $apicode );

    redirect( route( 'reservations?alert=1') );

}

