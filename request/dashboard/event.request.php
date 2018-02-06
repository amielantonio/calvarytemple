<?php


/**
 *
 * @return mixed
 * @throws exception
 */
function index(){

    return view( 'admin/events/events');

}


function store(){

    redirect( route('dashboard/events') );

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


function update(){

}


function destroy(){

}

function preview(){

}