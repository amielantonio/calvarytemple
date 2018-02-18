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
        "approved_date = '".date('Y-m-d H:i:s')."'" ,
        "updated_at = '".date('Y-m-d H:i:s')."'"

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



    //Notification
    if( !empty($pending)){
        $settings = get( 'settings', 1);
        $phone_number = cherryPick( 'reservations', $id, ['reserver_contact'] );

        $number = $phone_number[0]['reserver_contact'];
        $message = $settings[0]['approved_message'];
        $apicode = $settings[0]['sms_key'];

        itexmo( $number, $message, $apicode );
    }



    return view( 'admin/reservation/pending_reservation', compact('pending', 'alert'));
}


/**
 * Delete the specified resources
 * @param $resource
 * @throws exception
 * @return mixed
 */
function destroy( $resource ){
    // Return if no resource has been specified
    if( $resource == "" ){
        $alert = [
            'alertable' => 'warning',
            'message' => 'No Resources specified'
        ];
        return view( 'admin/reservation/pending_reservation', compact( 'alert' ));
    }

    $id = $resource;

    if( delete('reservations', $id) ){
        $alert = [
            'alertable'=> 'success',
            'message' => 'The Reservation has been cancelled.'
        ];
    }

    // Call the data from the database again
    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where);

    //Notification
    if( !empty($pending)){
        $settings = get( 'settings', 1);
        $phone_number = cherryPick( 'reservations', $id, ['reserver_contact'] );

        $number = $phone_number[0]['reserver_contact'];
        $message = $settings[0]['declined_message'];
        $apicode = $settings[0]['sms_key'];

        itexmo( $number, $message, $apicode );
    }

    return view( 'admin/reservation/pending_reservation', compact('pending', 'alert'));

}