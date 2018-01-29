<?php

/**
 * Show Pending reservation listing
 *
 * @return mixed
 * @throws exception
 */
function index(){

    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where);

    return view('admin','reservation/pending_reservation', compact('pending'));
}

/**
 * Update the reservation_status of a certain reservation listing
 *
 * @return mixed
 * @throws exception
 */
function approve(){
    if( isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $data = [
        "reservation_status = 'Approved'",
        'approved_by = "This Person"',
        "approved_date = ". date('Y-m-d h:i:s'),
        "updated_at = ". date('Y-m-d h:i:s')

    ];

    //Check if the request is successful
    if( patch('reservations', $id, $data ) ){
        $success = true;
    }

    // Call the data from the database again
    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where);

    return view('admin','reservation/pending_reservation', compact( 'success', 'pending') );


}