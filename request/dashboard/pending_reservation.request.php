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

    return view( 'admin/reservation/pending_reservation', compact('pending'));
}

/**
 * Update the reservation_status of a certain reservation listing
 *
 * @param $resource
 * @return mixed
 * @throws exception
 */
function pending_approve( $resource ){

    $id = $resource;

    $data = [
        "reservation_status = 'Approved'",
        'approved_by = "This Person"',
        "approved_date = '".date('Y-m-d h:i:s')."'" ,
        "updated_at = '".date('Y-m-d h:i:s')."'"

    ];

    //Check if the request is successful
    if( patch('reservations', $id, $data ) ){
        $alert = [
             'alertable'=> 'success',
            'message' => 'The Reservation has been approved.'
        ];
    }

    // Call the data from the database again
    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where);

    return view( 'admin/reservation/pending_reservation', compact('pending', 'alert'));
}


/**
 * Delete the specified resources
 * @throws exception
 */
function destroy(){
    // Return if no resource has been specified
    if( ! isset($_GET['id'])){
        $alert = [
            'alertable' => 'warning',
            'message' => 'No Resources specified'
        ];
        return view( 'admin/reservation/pending_reservation', compact( 'alert' ));
    }

    $id = $_GET['id'];

    if( delete('reservations', $id) ){
        $alert = [
            'alertable'=> 'success',
            'message' => 'The Reservation has been cancelled.'
        ];
    }

    // Call the data from the database again
    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where);

    return view( 'admin/reservation/pending_reservation', compact('pending', 'alert'));

}