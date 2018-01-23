<?php


function index(){

}

function show(){

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

function store(){

    $reservation_date = date('Y-m-d h:i:s', strtotime($_POST['reservation_date'] . " " . $_POST['time']));

    $data = [

        'reserver_name' => $_POST['reserver_name'],
        'reservation' => $_POST['reservation'],
        'reservation_date' => $reservation_date,
        'pastor' => $_POST['pastor'],
        'personnel' => '',
        'reservation_status' => '',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s'),


    ];

//    var_dump($data);

    if(insert('reservations', $data)){

    }else{

    }

}

function edit(){

}

function destroy(){

}

function update(){

}

