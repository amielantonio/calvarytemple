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

/** Migration tables */

$migration['migration'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'tables' => [
        'field_type' => 'VARCHAR(100)'
    ]
];

/** end migration tables */



$migration['users'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'username' => [
        'field_type' => 'VARCHAR(100)',
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
    'profile_picture'=> [
        'field_type' => 'VARCHAR(200)'
    ],
    'profile_summary' =>[
        'field_type' => 'TEXT'
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];

$migration['accounts'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'firstname' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'middlename' =>[
        'field_type' => 'VARCHAR(50)'
    ],
    'lastname' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'date_of_birth' => [
        'field_type' => 'DATE'
    ],
    'email' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'phone_number' => [
        'field_type' => 'VARCHAR(20)'
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];



$migration['reservations'] = [
    'id' => [
        'field_type' => 'INT',
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
        'field_type' => 'VARCHAR(100)',
        'is_null' => true
    ],
    'approved_by' => [
        'field_type' => 'VARCHAR(100)',
        'is_null' => true
    ],
    'reservation_status' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'approved_date' =>[
        'field_type' => 'DATETIME',
        'is_null' => true
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]

];

$migration['reservation_categories'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'reservation_category' => [
        'field_type' => 'VARCHAR(100)',
        'key' => 'UNIQUE'
    ],
    'category_description' => [
        'field_type' => 'TEXT'
    ]
];

$migration['pastors'] =[
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'pastor_firstname' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'pastor_lastname' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'phone_number' => [
        'field_type' => 'VARCHAR(15)'
    ]
];

$migration['events'] = [
    'id' => [
        'field_type' => 'INT',
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

$migration['posts'] = [
    'id' => [
        'field_type' => 'INT',
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

$migration['posts_categories'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'posts_category' => [
        'field_type' => 'VARCHAR(100)',
        'key' => 'UNIQUE'
    ],
    'category_description' => [
        'field_type' => 'TEXT'
    ]
];




/**
 * Return the instance of migration
 *
 * @return $migration
 */
return $migration;