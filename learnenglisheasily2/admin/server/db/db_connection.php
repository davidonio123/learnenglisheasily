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
include("./db/db_date1.php");

try {
    // Creazione della stringa DSN (Data Source Name)
    global $conn;
    $conn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    // Creazione dell'oggetto PDO
    $pdo = new PDO($conn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Attiva la gestione degli errori con eccezioni
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Imposta il fetch di default su array associativo
        PDO::ATTR_EMULATE_PREPARES => false // Usa prepared statements nativi
    ]);

} catch (PDOException $e) {
    echo json_encode(['status' => -1, 'message' => 'Il server non risponde.</br>Se il problema persiste contattare un amministratore.']);
    exit();
}