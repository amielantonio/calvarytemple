<?php

/**
 * Onload function for the views
 */
function index(){

    $where = [
        'created_at >=  NOW()  '
    ];

    $fields = where('reservations', $where );

    return view('admin','dashboard/dashboard', $fields);
}