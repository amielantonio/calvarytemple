<?php


/**
 * Database Migration file
 *
 * This file will create the web application's database
 * including the fields and data.
 */


/**
 *
 * @throws exception
 */
function migrate(){

    if(create_table()){
        echo 'Tables migrated';
    }
    save_migration_tables();

}

function drop_migrate(){

}

function refresh_migrate(){

}

/**
 * @throws exception
 */
function create_table(){

    //include migration
    $migration = require DBPATH . '/migration.php';

    //include connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    foreach($migration as $key => $value){

        $sql = process_migration_table( $key, $value, $db['TB_PREFIX'] );

        try{
            $conn->exec( $sql );
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}

/**
 * @param $table
 * @param $fields
 * @param $prefix
 * @return string
 * @throws exception
 */
function process_migration_table( $table, $fields, $prefix ){


    $result = "";
    $result .= "CREATE TABLE IF NOT EXISTS ";

        $result .= $prefix .  $table." " . "(";
        $delimiter = "";
        foreach( $fields as $val => $field_name){
            $result .= $delimiter . $val . " ";

            if( array_key_exists( 'field_type', $field_name )){
                $result .= $field_name['field_type']." ";
            }else{
                throw new exception('Migration Error: no Field type indicated');
            }

            if( array_key_exists( 'is_null', $field_name ) && $field_name['is_null']){
                $result .= "NULL ";
            }else{
                $result .= "NOT NULL ";
            }

            if( array_key_exists( 'key', $field_name ) ){
                $result .= $field_name['key']. "";
            }

            $delimiter = ", ";
        }
        $result .= ')';

    return $result;
}

function save_migration_tables(){
    //include migration
    $migration = require DBPATH . '/migration.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';



    $tables = array_keys( $migration );

    foreach( $tables as $table ){

        $value = [
            'tables' => $db['TB_PREFIX'].$table
        ];

        insert( 'migration', $value);
    }
}


function drop_tables(){

}

function refresh_tables(){

}