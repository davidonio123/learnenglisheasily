<?php

/*
Database:
Server type: MariaDB
Server version: 10.6.20-MariaDB
Database host: localhost
Database port: 3306
Database name: cfkehjye_learnenglishbyus
User: cfkehjye_learnenglishbyus
Password: BSogiQmzw9pF
*/


//PDO Connection

$servername="localhost";
$username="cfkehjye_learnenglishbyus";
$password="BSogiQmzw9pF";
$dbname="cfkehjye_learnenglishbyus";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    global $conn;
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Set the desired charset after establishing a connection
    mysqli_set_charset($conn, 'utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Handle the exception
    echo json_encode(['status' => -1, 'message' => 'Il server non risponde.</br>Se il problema persiste contattare un amministratore.']);
    exit();
}