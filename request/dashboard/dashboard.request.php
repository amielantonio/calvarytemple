<?php

/**
 * Show index page for the web application
 *
 * @return mixed
 * @throws exception
 */
function index(){

    //New Reservations

    $where = "DATEDIFF(NOW(), created_at) <= 5 AND reservation_status = 'Approved'";
    $new_reservations = where('reservations', $where, 3 );


    //Pending Reservations
    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where, 3);

    $pending_total = count( where( 'reservations', $where) );


    //Upcoming Reservations
    $where =  'DATEDIFF(NOW(), reservation_startdate) <= 30 AND reservation_startdate > NOW() AND reservation_status = "Approved"';
    $upcoming = where('reservations', $where, 3 );


    return view( 'admin/dashboard/dashboard', compact('new_reservations', 'pending', 'upcoming', 'pending_total'));

}