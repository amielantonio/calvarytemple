<?php

/**
 * Show the index page of the reservation module
 *
 * @return mixed
 * @throws exception
 */
function index(){


    $where = "MONTH( reservation_startdate ) = MONTH( NOW() ) AND reservation_status = 'Approved'";

    $reservation = where( 'reservations', $where );

    return view( 'admin/reservation/reservation', compact( 'reservation' ));
}

/**
 * Show a certain reservation resource
 *
 * @param $resource
 * @return mixed
 * @throws exception
 */
function show( $resource ){

    $where = "reservation_status <> 'Pending' AND id = {$resource}";
    $reservation = where( 'reservations', $where );
    $reservation = $reservation[0];

    return view('admin/reservation/preview_reservation', compact( 'reservation' ));
}

/**
 * Show this month's reservation
 */
function thismonth(){

    $where = "MONTH( reservation_startdate ) = MONTH( NOW() )";

    $reservation = where( 'reservations', $where );

    echo json_encode( $reservation );
    exit;
}


/**
 * Get all resources from the reservation
 */
function get_all(){
    $where = "reservation_status <> 'Pending'";
    $reservations = where( 'reservations', $where );

    echo json_encode( $reservations );
    exit;
}

/**
 * Show a form for saving new reservation
 *
 * @return mixed
 * @throws exception
 */
function create(){

    $reservation_types = all('reservation_categories');

    return view( 'admin/reservation/add_reservation', compact('reservation_types'));

}

/**
 * Save a specific record to the database
 *
 * @return mixed
 * @throws exception
 */
function store(){

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

        redirect( route( 'dashboard/reservation/create?alert=1' ) );
        return false;
    }

    $second_check = where( 'reservations', "'{$request_buffered}' < reservation_startdate  AND reservation_startdate < '{$request_end}'" );

    if( !empty( $second_check ) ){

        redirect( route( 'dashboard/reservation/create?alert=1' ) );
        return false;
    }



    $data = [

        'reserver_name' => $_POST['reserver_name'],
        'reserver_contact' => $_POST['reserver_contact'],
        'reservation' => $_POST['reservation'],
        'reservation_startdate' => $request_start,
        'reservation_enddate' => $request_end,
        'facilitator' => $_POST['facilitator'],
        'approved_by' => $_POST['approved_by'],
        'approved_date' => date( 'Y-m-d H:i:s' ),
        'reservation_status' => 'Approved',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),


    ];


    insert('reservations', $data );

    redirect( route( 'dashboard/reservation' ) );
    return true;
}


/**
 * Save Categoriees to Reservation category database
 */
function savecat(){

    $data =[

        'reservation_category' => $_POST['reservation_category'],
        'category_description' => $_POST['category_description'],
        'reservation_duration' => $_POST['reservation_duration']

    ];

    insert( 'reservation_categories', $data );

    redirect( route('dashboard/reservation/categories') );
}

