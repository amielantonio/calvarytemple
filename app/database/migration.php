<?php


/**
 * Application Migration files
 *
 * This file will contain all the table information of the
 * web application.
 */

// EXAMPLE MIGRATION
// ------------------------------------------
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
        'is_null' => false,
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'username' => [
        'field_type' => 'VARCHAR(100)',
        'is_null' => false,
        'key' => 'UNIQUE'
    ],
    'password' => [
        'field_type' => 'VARCHAR(100)',
        'is_null' => true
    ],
    'salt' =>[
        'field_type' => 'DATETIME',
    ],
    'access_level' =>[
        'field_type' => 'VARCHAR(100)',
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ]

];

$migration['reservation'] = [
    'id' => [
        'field_type' => 'INT',
        'is_null' => false,
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'reserver_name' => [
        'field_type' => 'VARCHAR(100)',
    ],
    'reservation' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'reservation_date' => [
        'field_type' => 'DATETIME',
    ],
    'pastor' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'personnel' => [
        'field_type' => 'VARCHAR(100)',
        'is_null' => true
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]

];

$migration['events'] = [
    'id' => [
        'field_type' => 'INT',
        'is_null' => false,
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'event' =>[
        'field_type' => "VARCHAR(100)"
    ],
    'event_description' => [
        'field_type' => 'TEXT'
    ],
    'event_date' => [
        'field_type' => 'DATETIME'
    ],
    'event_details' => [
        'field_type' => 'TEXT'
    ],
    'event_tag' =>[
        'field_type' => 'VARCHAR(50)'
    ],
    'author' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];

$migration['post'] = [
    'id' => [
        'field_type' => 'INT',
        'is_null' => false,
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'post_name' =>[
        'field_type' => "VARCHAR(100)"
    ],
    'post_text' => [
        'field_type' => 'TEXT'
    ],
    'categories' =>[
        'field_type' => 'TEXT'
    ],
    'tag' =>[
        'field_type' => 'TEXT'
    ],
    'featured_image' =>[
        'field_type' => 'TEXT'
    ],
    'post_date' =>[
        'field_type' => 'DATETIME'
    ],
    'author' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];






/**
 * Return the instance of migration
 *
 * @return $migration
 */
return $migration;