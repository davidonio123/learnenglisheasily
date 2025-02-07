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

$host = "localhost"; // Es. localhost o IP del server
$port = "3306"; // Es. 3306 (default per MySQL)
$dbname = "cfkehjye_learnenglishbyus";
$user = "cfkehjye_learnenglishbyus";
$password = "BSogiQmzw9pF";

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


    echo json_encode(['status' => 200, 'message' => 'connessione al database riuscita']);

} catch (PDOException $e) {
    echo json_encode(['status' => -1, 'message' => 'Il server non risponde.</br>Se il problema persiste contattare un amministratore.']);
    exit();
}