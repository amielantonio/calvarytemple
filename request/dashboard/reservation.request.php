<?php

/**
 * Show the index page of the reservation module
 *
 * @return mixed
 */
function index(){


    $where = "MONTH( reservation_date ) = MONTH( NOW() ) AND reservation_status = 'Approved'";

    $reservation = where( 'reservations', $where );

    return view('admin', 'reservation/reservation', compact( 'reservation' ));
}


function show(){


    $where = "reservation_status <> 'Pending' ";
    $reservations = where( 'reservations', $where );

    echo json_encode( $reservations );
    exit;

}

/**
 * Show this month's reservation
 */
function thismonth(){

    $where = "MONTH( reservation_date ) = MONTH( NOW() )";

    $reservation = where( 'reservations', $where );

    echo json_encode( $reservation );
    exit;
}

/**
 * Show a form for saving new reservation
 *
 * @return mixed
 * @throws exception
 */
function create(){

    return view( 'admin', 'reservation/add_reservation');

}

/**
 * Save a specific record to the database
 */
function store(){

    $reservation_date = date('Y-m-d h:i:s', strtotime($_POST['reservation_date'] . " " . $_POST['time']));

    $data = [

        'reserver_name' => $_POST['reserver_name'],
        'reservation' => $_POST['reservation'],
        'reservation_date' => $reservation_date,
        'pastor' => $_POST['pastor'],
        'personnel' => $_POST['personnel'],
        'reservation_status' => '',
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
        'category_description' => $_POST['category_description']

    ];

    insert( 'reservation_categories', $data );

    header('Location: reservation/categories');
}

