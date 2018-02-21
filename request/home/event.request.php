<?php


function index(){
    $event = all( 'events' );

    return view( 'frontend/event/event', compact( 'event' ) );
}