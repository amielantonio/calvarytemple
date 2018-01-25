<?php

/**
 * Database Queries
 */


/**
 * Fetch all records from the table
 *
 * @param $table
 * @return mixed
 */
function all( $table ){

//pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    $sql = sprintf(

        'SELECT * FROM %s',
        $table

    );

    $statement = $conn->prepare( $sql );

    try {

        $statement->execute();

        return $statement->fetchAll();

    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

}

/**
 * Fetch all data with specific fields
 *
 * @param $table
 * @param string $fields
 * @param string $limit < default = 1 >
 * @return mixed
 */
function get($table, $fields = '', $limit = "1" ){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Check if parameter is an array or string
    if( is_array( $fields )){
        $fields = implode( ', ', $fields);
    }

    //Create SQL statement
    $sql = sprintf(

        'SELECT %s FROM %s LIMIT %s',
        $fields, $table, $limit

    );

    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        return $statement->fetchAll();
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

}

/**
 * Fetch first instance of the database
 *
 * @param $table
 * @param $order
 * @return mixed
 */
function first( $table, $order){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Create SQL statement
    $sql = sprintf(

        'SELECT * FROM %s ORDER BY %s LIMIT 1',
        $table, $order

    );

    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        return $statement->fetchAll();
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }
}

/**
 * Fetch records limited to the number of resources needed
 *
 * @param $table
 * @param $limit
 * @return mixed
 */
function atleast( $table, $limit){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Create SQL statement
    $sql = sprintf(

        'SELECT * FROM %s LIMIT $s',
        $table, $limit

    );

    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        return $statement->fetchAll();
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

}

/**
 * Fetch all records that corresponds
 * to the where clause
 *
 * @param $table
 * @param array $where
 * @return mixed
 */
function where( $table, $where = []){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Check if parameter is an array or string
    if( is_array( $where )){
        $where = implode( ', ', $where);
    }

    //Create SQL statement
    $sql = sprintf(

        'SELECT * FROM %s WHERE %s',
        $table, $where

    );

    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        return $statement->fetchAll();
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }
}


function find($table, $primary_key){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Create SQL statement
    $sql = sprintf(

        'SELECT * FROM %s WHERE id = "%s"',
        $table, $primary_key

    );

    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        return $statement->fetchAll();
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

}


/**
 * Insert records to the database
 *
 * @param $table
 * @param array $data
 */
function insert( $table, $data = [] ){

    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Store keys in an array
    $keys = array_keys( $data );

    //Store placeholders
    $placeholders = prepare_param( $keys );


    //Create SQL statement
    $sql = sprintf(
        'INSERT INTO %s (%s) VALUES (%s)',
        $table,
        implode(', ', $keys ),
        implode(', ',$placeholders)
    );

    //Prepare and bind
    $statement = $conn->prepare( $sql );


    try {
        $statement->execute( $data );

    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

}

function patch( $table, $id, $data = [], $where = "" ){

}

function put(){

}


function delete( $table, $id, $where = ""){

}


function last_id( $table ){

}

/**
 * Prepare parameters for SQL
 *
 * @param array $array
 * @return array
 */
function prepare_param( $array = [] ){

    $param = array_map( function( $array ){

        return ":{$array}";

    }, $array);

    return $param;
}