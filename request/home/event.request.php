<?php


/**
 * Index functio get all recent events a upcoming events
 *
 * @return mixed
 * @throws exception
 */
function index(){
    $upcomingEvents = where( 'events', ' NOW() < event_startdate', 5);

    return view( 'frontend/events/events', compact( 'upcomingEvents' ) );
}

