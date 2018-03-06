<?php


/**
 *
 * @return mixed
 * @throws exception
 */
function index(){

    $events = allWithoutTrash( 'events' );

    return view( 'admin/events/events', compact( 'events' ));

}

/**
 * Show the frontend of the event
 *
 * @param $resource
 * @return mixed
 */
function show( $resource ){


    $event = where( 'events', "event_url = '{$resource}'" );


    return view( 'frontend/events/single_event', compact( 'event' ) );
}


/**
 * Save the specific Event to the database
 *
 * @return bool
 */
function store(){

    //Create Destination path
    $month = date('m');
    $year = date( 'Y' );
    $upload_dir = upload_img_posts().'\\'.$year.'\\'.$month.'\\';


    $event_status = isset($_POST['btn-publish']) ? $post_status = 'published' : $post_status = 'draft';

    $data = [

        'event'             => $_POST['event'],
        'event_url'         => slugify($_POST['event']),
        'event_image'       => asset( "uploads/{$year}/{$month}/" . $_FILES['event_image']['name'] ),
        'event_description' => $_POST['event_description'],
        'event_startdate'   => date( 'Y-m-d', strtotime( $_POST['event_startdate'] ) ),
        'event_enddate'     => date( 'Y-m-d', strtotime( $_POST['event_enddate'] ) ),
        'event_details'     => $_POST['event_details'],
        'event_tag'         => $_POST['event_tag'],
        'event_status'      => $event_status,
        'author'            => auth_user()['firstname']." ".auth_user()['lastname'],
        'created_at'        => date( 'Y-m-d H:i:s' ),
        'updated_at'         => date( 'Y-m-d H:i:s' ),

    ];


    if(!upload_post_image( $_FILES['event_image'], $upload_dir )){
        return false;
    }

    insert( 'events', $data );

    redirect( route( 'dashboard/events' ) );

}

/**
 * Show a form for saving an event resource
 *
 * @return mixed
 * @throws exception
 */
function create(){

    return view( 'admin/events/add_event');
}

/**
 * Show a form for editing an event resource
 *
 * @param $resource
 * @return mixed
 */
function edit( $resource ){

    $event = get( 'events', $resource );

    return view( 'admin/events/add_event', $event );

}

/**
 * Updates the data of the specified event
 *
 * @param $resource
 * @return bool
 */
function update( $resource ){

//Create Destination path
    $month = date('m');
    $year = date( 'Y' );
    $upload_dir = upload_img_posts().'\\'.$year.'\\'.$month.'\\';


    $event_status = isset($_POST['btn-publish']) ? $post_status = 'published' : $post_status = 'draft';

    $data = [

        'event'             => $_POST['event'],
        'event_url'         => slugify($_POST['event']),
        'event_image'       => asset( "uploads/{$year}/{$month}/" . $_FILES['event_image']['name'] ),
        'event_description' => $_POST['event_description'],
        'event_startdate'   => date( 'Y-m-d', strtotime( $_POST['event_startdate'] ) ),
        'event_enddate'     => date( 'Y-m-d', strtotime( $_POST['event_enddate'] ) ),
        'event_details'     => $_POST['event_details'],
        'event_tag'         => $_POST['event_tag'],
        'event_status'      => $event_status,
        'author'            => auth_user()['firstname']." ".auth_user()['lastname'],
        'created_at'        => date( 'Y-m-d H:i:s' ),
        'updated_at'         => date( 'Y-m-d H:i:s' ),

    ];


    if(!upload_post_image( $_FILES['event_image'], $upload_dir )){
        return false;
    }

    patch( 'events', $resource, $data );

    redirect( route( "dashboard/events/{$resource}" ) );

}

/**
 * Permanently delete the specified event to the database
 *
 * @param $resource
 */
function destroy( $resource ){

    delete( 'events', $resource );

    redirect( route( 'dashboard/events' ) );

}

/**
 * View all trashed resources
 *
 * @return mixed
 */
function all_trash(){

    $events = trashed( 'events' );

    return view( 'admin/events/trash_events', compact( 'events' ));
}

/**
 * Soft Deletes a specific resource
 *
 * @param $resource
 */
function trash( $resource ){

    softDelete( 'events', $resource );

    redirect( route( 'dashboard/events' ) );

}

/**
 * Restore a trashed resource
 *
 * @param $resource
 */
function restore( $resource ){
    softRestore( 'events', $resource );

    redirect( route( 'dashboard/events' ) );
}
function preview( $resource ){

    $event = get( 'events', $resource );


    return view( 'frontend/events/single_event', compact( 'event'));
}