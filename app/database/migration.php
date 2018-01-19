<?php


/**
 * Application Migration files
 *
 * This file will contain all the table information of the
 * web application.
 */



// EXAMPLE MIGRATION
// $migration['table_name'] = [
//
//    'field_name' => [
//        'field_type' => '',
//        'is_null' => '',
//        'key' => ''
//    ],
//    'field_name2' => [
//        'field_type' => '',
//        'is_null' => '',
//        'key' => ''
//    ]
//
// ];



$migration['users'] = [
    'id' => [
        'field_type' => 'INT',
        'is_null' => 'NOT NULL',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'username' => [
        'field_type' => 'VARCHAR(100)',
        'is_null' => 'NOT NULL',
        'key' => 'UNIQUE'
    ]

];




return $migration;