<?php

//PDO Connection

require_once './db/db_date.php';

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