<?php


function index(){

    $where = 'reservation_startdate < "'.date('Y-m-d') .'%" AND reservation_status = "Approved"';

    $archive = where( 'reservations', $where);

    return view( 'admin', 'reservation/archive_reservation', compact('archive'));
}