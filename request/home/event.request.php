<?php


/**
 * Index functio get all recent events a upcoming events
 *
 * @return mixed
 */
function index(){
    $upcomingEvents = where( 'events', 'DATE( NOW() ) > event_startdate', 5);

    $recentEvents = where( 'events', 'DATE( NOW() ) < event_startdate', 5 );

    return view( 'frontend/events/events', compact( 'upcomingEvents, recentEvents' ) );
}

