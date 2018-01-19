<?php


/**
 * Database Migration file
 *
 * This file will create the web application's database
 * including the fields and data.
 */



function run_migration(){

    create_table();

}



function create_database(){



}


function create_table(){

    //include migration
    $migration = require DBPATH . '/migration.php';

    $db = require CONFIGPATH . '/database.php';

    //include connection
    require DBPATH . '/database.php';


    process_migration_table( $migration, $db['TB_PREFIX'] );



}

function process_migration_table( $migration, $prefix ){

    $result = "CREATE TABLE IF NOT EXISTS ";

    foreach($migration as $key => $value){

        $result .= "{" . $prefix .  $key." ";
        foreach( $value as $val => $field_name){
            $result .= $val. " " .
                $field_name['field_type']. " " .
                $field_name['is_null']. " " .
                $field_name['key']. " ";
        }
    }
    $result .= '}';

    echo $result;
}