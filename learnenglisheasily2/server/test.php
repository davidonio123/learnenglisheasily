<?php

include("./server/db/db_connection.php");

global $conn;

try {
    $query = "SELECT * FROM user";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<count($users); $i++){
        echo $users[$i]->name;
    }
} catch (PDOException $e) {
    echo "errore con la connessione al db". $e->getTraceAsString();
}
exit;