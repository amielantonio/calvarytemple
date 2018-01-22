<?php

/**
 * Database Connection file
 *
 * This file will try to connect to the existing MYSQL database
 */



// Require database configuration file

$db = require CONFIGPATH.'/database.php';

$dbname = $db['DB_NAME'];
$host = $db['DB_HOST'];
$username = $db['DB_USER'];
$password = $db['DB_PASS'];


/**
 * Try to Connect to PDO Database
 *
 * @exception $e
 */
try{

    $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch( PDOException $e ){

    throw new PDOException($e->getMessage());

}