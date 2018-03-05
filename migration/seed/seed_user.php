<?php


$Seed[ 'users' ] = [

    'username'          => 'admin',
    'firstname'         => 'Rommer',
    'middlename'        => '',
    'lastname'          => 'Tiangco',
    'date_of_birth'     => date( 'Y-m-d', strtotime('06/02/1995' ) ),
    'email'             => 'rommertiangco@gmail.com',
    'phone_number'      => '09756660209',
    'created_at'        => date( 'Y-m-d H:i:s' ),
    'updated_at'        => date( 'Y-m-d H:i:s' )

];

$Seed[ 'accounts' ] = [
    'username'          => 'admin',
    'password'          => md5('admin123'. date( 'Y-m-d H:i:s', strtotime( '01/0/2001 01:01:01' ) ) ),
    'salt'              => date( 'Y-m-d H:i:s', strtotime( '01/0/2001 01:01:01' ) ),
    'access_level'      => 'superadmin',
    'profile_picture'   => '',
    'profile_summary'   => '',
    'created_at'        => date( 'Y-m-d H:i:s' ),
    'updated_at'        => date( 'Y-m-d H:i:s' )
];

/**
 * Return Seed instance
 */
return $Seed;

