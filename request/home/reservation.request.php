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
 * @return mixed
 * @throws exception
 */
function store(){

    //Redirect to reservations when a direct access was done without sending payloads
    if( !isset($_POST) ){
        redirect( 'reservations' );
    }

    date_default_timezone_set( 'Asia/Manila' );


    $buffer = '2 Hours';

    $request_start = date( 'Y-m-d H:i:s', strtotime( $_POST['reservation_startdate']." ".$_POST['startTime'] ) );
    $duration = '2 Hours';

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



    $data = [

        'reserver_name' => $_POST['reserver_name'],
        'reservation' => $_POST['reservation'],
        'reservation_startdate' => $request_start,
        'reservation_enddate' => $request_end,
        'facilitator' => $_POST['facilitator'],
        'reservation_status' => 'Pending',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),


    ];


    if( insert('reservations', $data ) ){
        $alert = [
            'alertable'=> 'success',
            'message' => 'The Reservation has been sent.'
        ];

        $number = '09756660209';
        $message = "New {$_POST['reservation']} reservation scheduled, date:{$startDate}";
        $apicode = "TR-AMIEL660209_EAYFS";

        $result = itexmo( $number, $message, $apicode );

        if ($result == ""){
            echo "iTexMo: No response from server!!!
                Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                Please CONTACT US for help. ";
        }else if ($result == 0){
            echo "Message Sent!";
        }
        else{
            echo "Error Num ". $result . " was encountered!";
        }
    }


    return view( 'frontend/home/reservations', compact( 'alert' ) );
}

function itexmo($number,$message,$apicode){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}