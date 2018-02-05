<?php


/**
 *
 * @return mixed
 */
function index(){

    return view('admin', 'events/events');

}


function store(){


    redirect( direct_admin_url('events') );

}

function create(){

    return view( 'admin', 'events/add_event');
}


function update(){

}


function destroy(){

}

function preview(){

}