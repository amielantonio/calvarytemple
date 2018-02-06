<?php

/**
 * Show index page for the web application
 *
 * @return mixed
 * @throws exception
 */
function index(){

    //New Reservations

    $now = date('Y-m-d');
    $where = "created_at >={$now} AND reservation_status = 'Approved'";
    $new_reservations = where('reservations', $where );


    //Pending Reservations
    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where, 3);


    //Upcoming Reservations
    $where =  'DATEDIFF(NOW(), reservation_startdate) <= 30 AND reservation_startdate > NOW() AND reservation_status = "Approved"';
    $upcoming = where('reservations', $where );


    return view( 'admin/dashboard/dashboard', compact('new_reservations', 'pending', 'upcoming'));

}