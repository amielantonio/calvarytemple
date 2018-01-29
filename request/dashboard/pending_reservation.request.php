<?php

/**
 * Show Pending reservation listing
 *
 * @return mixed
 */
function index(){

    $where = "reservation_status = 'Pending'";

    $pending = where('reservations', $where);

    return view('admin','reservation/pending_reservation', compact('pending'));
}


function approve(){
//    if( isset($_GET['id'])){
//        $id = $_GET['id'];
//    }
//
//    $data = [
//        "reservation_status = 'Approved'",
//        'approved_by = "This Person"',
//        "approved_date = ". date('Y-m-d'),
//        "updated_at = ". date('Y-m-d')
//
//    ];
//
//
//    patch('reservations', $id, $data);




//    return view('admin', 'dashboard/dashboard');
}

function create(){

    return view('admin', 'dashboard/dashboard');
}