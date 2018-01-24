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


//    redirect( direct_admin_url( 'dashboard/reservation' ) );

    header("Location: reservation");
}

function edit(){
    echo "test edit";
}

function destroy(){
    echo "test destroy";
}

function update(){
    echo "test update";
}

/**
 * Save Categoriees to Reservation category database
 */
function savecat(){

    $data =[

        'reservation_category' => $_POST['reservation_category'],
        'category_description' => $_POST['category_description']

    ];

    var_dump($data);

    insert( 'reservation_categories', $data );

    header('Location: reservation/categories');

}

