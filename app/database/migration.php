<?php


/**
 * Application Migration files
 *
 * This file will contain all the table information of the
 * web application.
 */

// EXAMPLE MIGRATION
// ------------------------------------------
// $Migration['table_name'] = [
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

$Migration['migration'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'tables' => [
        'field_type' => 'VARCHAR(100)'
    ]
];

/** end migration tables */



$Migration['users'] = [

    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
        'username' => [
        'field_type' => 'VARCHAR(50)'
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

$Migration['accounts'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'username' => [
        'field_type' => 'VARCHAR(100)',
        'key' => 'UNIQUE'
    ],
    'password' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'salt' =>[
        'field_type' => 'DATETIME',
    ],
    'access_level' =>[
        'field_type' => 'VARCHAR(100)',
    ],
    'profile_picture'=> [
        'field_type' => 'VARCHAR(200)',
        'is_null' => true
    ],
    'profile_summary' =>[
        'field_type' => 'TEXT',
        'is_null' => true
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];



$Migration['reservations'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'reserver_name' => [
        'field_type' => 'VARCHAR(100)',
    ],
    'reserver_contact' => [
        'field_type' => 'VARCHAR(100)',
    ],
    'reservation' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'reservation_startdate' => [
        'field_type' => 'DATETIME',
    ],
    'reservation_enddate' => [
        'field_type' => 'DATETIME',
    ],
    'facilitator' => [
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

$Migration['reservation_categories'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'reservation_category' => [
        'field_type' => 'VARCHAR(100)',
        'key' => 'UNIQUE'
    ],
    'category_description' => [
        'field_type' => 'TEXT',
        'is_null' => true
    ],
    'reservation_duration' => [
        'field_type' => 'VARCHAR(50)'
    ]
];

$Migration['facilitators'] =[
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'first_name' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'last_name' => [
        'field_type' => 'VARCHAR(50)'
    ],
    'phone_number' => [
        'field_type' => 'VARCHAR(15)'
    ],
    'position' => [
        'field_type' => 'VARCHAR(50)'
    ]
];

$Migration['events'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'event' =>[
        'field_type' => "VARCHAR(100)"
    ],
    'event_url' =>[
        'field_type' => "VARCHAR(100)"
    ],
    'event_image' =>[
        'field_type' => 'TEXT',
        'is_null' => true
    ],
    'event_description' => [
        'field_type' => 'TEXT'
    ],
    'event_startdate' => [
        'field_type' => 'DATETIME'
    ],
    'event_enddate' => [
        'field_type' => 'DATETIME'
    ],
    'event_details' => [
        'field_type' => 'TEXT'
    ],
    'event_tag' =>[
        'field_type' => 'VARCHAR(50)'
    ],
    'event_status' =>[
        'field_type' => 'VARCHAR(50)'
    ],
    'author' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'is_delete' =>[
        'field_type' => 'INT(1)'
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];

$Migration['posts'] = [
    'id' => [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'post_title' =>[
        'field_type' => "VARCHAR(100)"
    ],
    'post_url' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'post_body' => [
        'field_type' => 'TEXT'
    ],
    'post_excerpt' => [
        'field_type' => 'TEXT'
    ],
    'category' =>[
        'field_type' => 'VARCHAR(100)',
        'is_null' => true

    ],
    'tags' =>[
        'field_type' => 'VARCHAR(200)',
        'is_null' => true
    ],
    'featured_image' =>[
        'field_type' => 'TEXT',
        'is_null' => true
    ],
    'published_date' =>[
        'field_type' => 'DATE'
    ],
    'author' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'post_status' =>[
           'field_type' => 'VARCHAR(50)'
    ],
    'post_likes' => [           // we will only save the number of likes, and not the number of people
        'field_type' => 'INT'   // who pressed the like button
    ],
    'is_delete' => [
        'field_type' => 'INT(1)'
    ],
    'created_at' =>[
        'field_type' => 'DATETIME',
    ],
    'updated_at' => [
        'field_type' => 'DATETIME'
    ]
];

$Migration['posts_categories'] = [
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

// Future Enhancement
// Saving the table Schema for future purposes
$Migration['post_comments'] = [
    'id' =>[
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'commenter' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'comment' => [
        'field_type' => 'TEXT'
    ],
    'comment_date' => [
        'field_type' => 'DATE'
    ],
    'post_id' => [
        'field_type' => 'INT'
    ],
    'comment_id' => [
        'field_type' => 'INT',
        'is_null' => true
    ]
];

$Migration['settings'] = [

    'id'=> [
        'field_type' => 'INT',
        'key' => 'PRIMARY KEY AUTO_INCREMENT'
    ],
    'sms_key' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'phone_number' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'notification_message' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'approved_message' => [
        'field_type' => 'VARCHAR(100)'
    ],
    'declined_message' => [
        'field_type' => 'VARCHAR(100)'
    ]

];


/**
 * Return the instance of migration
 *
 * @return $Migration
 */
return $Migration;