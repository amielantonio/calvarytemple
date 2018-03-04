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
 * Get an Item from the collection by key
 *
 * @param $table
 * @param string $key
 * @return mixed
 */
function get($table, $key ){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Create SQL statement
    $sql = "SELECT * FROM {$table} WHERE id = {$key}";

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
 * Pick a field of the specified resource or
 * pick a specified field of all resources
 *
 * @param $table
 * @param $key
 * @param array $fields
 * @return mixed
 */
function cherryPick( $table, $key = "", $fields = []){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    $fields = empty($fields) ? "*" : implode(', ', $fields);

    //Create SQL statement
    $sql = "SELECT {$fields} FROM {$table} ";

    if($key<> ""){
        $sql.="WHERE id={$key}";
    }

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
 * Soft deletes a resource
 *
 * @param $table
 * @param $id
 * @return bool
 */
function softDelete( $table, $id ){
//pull in connection
    $conn = require DBPATH . '/connection.php';
    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';
    //create table instance
    $table = $db['TB_PREFIX'] . $table;
    $sql = sprintf(
        'UPDATE %s SET is_delete="1" WHERE id = %s',
        $table, $id
    );
    //Prepare and bind
    $statement = $conn->prepare( $sql );
    try {
        $statement->execute();
        return true;
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }
}

/**
 * Restore from soft delete
 *
 * @param $table
 * @param $id
 * @return bool
 */
function softRestore( $table, $id ){
//pull in connection
    $conn = require DBPATH . '/connection.php';
    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';
    //create table instance
    $table = $db['TB_PREFIX'] . $table;
    $sql = sprintf(
        'UPDATE %s SET is_delete="0" WHERE id = %s',
        $table, $id
    );
    //Prepare and bind
    $statement = $conn->prepare( $sql );
    try {
        $statement->execute();
        return true;
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }
}

/**
 * Return only the resources that are not deleted
 *
 * @param $table
 * @return mixed
 */
function allWithoutTrash( $table ){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    $sql = "SELECT * FROM {$table} WHERE is_delete=0";

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
 * Return all trashed resources
 *
 * @param $table
 * @param string $id
 * @return mixed
 */
function trashed( $table, $id="" ){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Create SQL statement
    $sql = "SELECT * FROM {$table} WHERE is_delete=1";


    if($id <> ""){
        $sql .= "AND id={$id}";
    }

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
 * Get the first record that matches the given attributes or create it
 *
 * @param $_table
 * @param $attribute
 * @param $value
 * @return mixed
 */
function firstOrCreate($_table, $attribute, $value = ""){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $_table;

    // Action starts here
    // Select the primary key form the database

    //Create SQL statement
    $sql = sprintf(

        'SELECT * FROM %s WHERE %s = "%s"',
        $table, $attribute, $value

    );

    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        $result =  $statement->fetchAll();
    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

    if( !empty($result)){
        return $result;
    }

    //Create the Model Instance


    $data = [
        $attribute => $value
    ];

    insert( $_table, $data);

}

function rawQuerySelect( $sql ){
    //pull in connection
    $conn = require DBPATH . '/connection.php';
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
 * Inner Join 2 tables
 *
 * @param array $tables
 * @param array $fields
 * @param $keys
 * @param string $where
 * @return mixed
 */
function innerJoin( $tables = [], $fields = [], $keys, $where = ""){

    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance

    $fields = empty($fields) ? "*" : implode(', ', $fields);

    //Create SQL statement
    $sql = "SELECT {$fields} FROM {$db['TB_PREFIX']}{$tables[0]} INNER JOIN {$db['TB_PREFIX']}{$tables[1]} ON {$db['TB_PREFIX']}{$tables[0]}.{$keys[0]} = {$db['TB_PREFIX']}{$tables[1]}.{$keys[1]}";


    $where <> "" ? $sql.= " WHERE ".$where : "";

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
 * @param $where
 * @param string $limit
 * @return mixed
 */
function where( $table, $where="", $limit = ''){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Create SQL statement
    $sql = sprintf(

        'SELECT * FROM %s WHERE %s',
        $table, $where

    );

    //Check if limit is available
    if($limit <> ""){
        $sql .= sprintf( " LIMIT %s", $limit );
    }


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
 * @return bool
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

        return true;

    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }

}

/**
 * Update a certain resources in the database
 *
 * @param $table
 * @param $id
 * @param array $data
 * @param string $where
 * @return bool
 */
function patch( $table, $id, $data = [], $where = "" ){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    //Get data to update
    $updates = "";

    $d = "";
    foreach( $data as $key => $value){

        $updates .= $d . "{$key}='{$value}'";
        $d = ", ";


    }

    $sql = sprintf(

        'UPDATE %s SET %s WHERE id = %s',
        $table, $updates, $id

    );

    if( $where <> "" ){
        $sql .= 'AND ' . $where;
    }

    //Prepare and bind
    $statement = $conn->prepare( $sql );

    try {
        $statement->execute( $data );

        return true;

    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }
}

/**
 * Update a specific resource if the resource is available, Create it if is not.
 *
 * @param $table
 * @param $data
 * @param string $where
 * @return bool
 */
function updateOrCreate( $table, $data, $where = ""){

    $result = where( $table, $where );

    if( empty( $result ) ){

        insert( $table, $data );
        return true;
    }

    $id = $result[0]['id'];

    patch( $table, $id, $data );
}


function delete( $table, $id, $where = ""){
    //pull in connection
    $conn = require DBPATH . '/connection.php';

    // Require database configuration file
    $db = require CONFIGPATH.'/database.php';

    //create table instance
    $table = $db['TB_PREFIX'] . $table;

    $sql = sprintf(

        'DELETE FROM %s WHERE id = %s',
        $table, $id

    );

    if( $where <> "" ){
        $sql .= 'AND ' . $where;
    }

    //Prepare and bind
    $statement = $conn->prepare( $sql );

    try {
        $statement->execute();

        return true;

    }
    catch( PDOException $e ) {
        throw new PDOException($e->getMessage());
    }


}

function last_id( $table ){

}



function orderBy( $array, $order){

}



/** HELPER CLASSES */



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