<?php
include("./db/db_date1.php");

try {
    // Creazione della connessione MySQLi
    $conn = new mysqli($host, $user, $password, $dbname, $port);

    // Controllo della connessione
    if ($conn->connect_error) {
        throw new Exception("Connessione fallita: " . $conn->connect_error);
    }

    // Impostazione della codifica dei caratteri
    $conn->set_charset("utf8mb4");

} catch (Exception $e) {
    echo json_encode([
        'status' => -1,
        'message' => $host . '</br>Il server non risponde.</br>Se il problema persiste contattare un amministratore.</br>' . $e->getMessage()
    ]);
    exit();
}
?>
