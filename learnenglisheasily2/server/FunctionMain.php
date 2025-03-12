<?php

include("./db/db_connection.php");
function getUserList() {
    global $pdo; // Assumiamo che $pdo sia la connessione PDO già inizializzata

    try {
        $query = "SELECT * FROM user";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($users) {
            $data = [
                'status' => 200,
                'message' => 'User trovati con successo',
                'data' => $users
            ];
        } else {
            $data = [
                'status' => 404,
                'message' => 'Nessun user trovato'
            ];
        }
    } catch (PDOException $e) {
        $data = [
            'status' => 500,
            'message' => 'Errore del server: ' . $e->getMessage()
        ];
    }

    return json_encode($data, JSON_PRETTY_PRINT);
}

function getCommentList() {
    global $pdo; // Assumendo che $pdo sia un'istanza di PDO

    try {
        $query = "SELECT * FROM commenti";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($comments) {
            $data = [
                'status' => 200,
                'message' => count($comments) . ' commenti trovati con successo',
                'data' => $comments
            ];
        } else {
            $data = [
                'status' => -1,
                'message' => 'Non ci sono commenti :)'
            ];
        }
    } catch (PDOException $e) {
        $data = [
            'status' => -1,
            'message' => 'Errore del server: ' . $e->getMessage()
        ];
    }
    
    return json_encode($data, JSON_PRETTY_PRINT);
}
