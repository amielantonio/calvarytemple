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
 */
function store(){

    $startDate = date('Y-m-d h:i:s', strtotime($_POST['reservation_startdate'] . " " . $_POST['startTime']));
    $endDate = date('Y-m-d h:i:s', strtotime($_POST['reservation_enddate'] . " " . $_POST['endTime']));

    $data = [

        'reserver_name' => $_POST['reserver_name'],
        'reservation' => $_POST['reservation'],
        'reservation_startdate' => $startDate,
        'reservation_enddate' => $endDate,
        'facilitator' => $_POST['facilitator'],
        'approved_by' => $_POST['personnel'],
        'reservation_status' => 'Approved',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s'),


    ];


    insert('reservations', $data );

    header("Location: reservation");
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

