<?php

include("./db/db_connection.php");
function getUserList() {
    global $conn; // Assumiamo che $conn sia la connessione MySQLi già inizializzata

    try {
        $query = "SELECT * FROM user";
        $result = $conn->query($query);

        if ($result === false) {
            throw new Exception("Errore nella query: " . $conn->error);
        }

        $users = $result->fetch_all(MYSQLI_ASSOC);

        if (!empty($users)) {
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
    } catch (Exception $e) {
        $data = [
            'status' => 500,
            'message' => 'Errore del server: ' . $e->getMessage()
        ];
    }

    return json_encode($data, JSON_PRETTY_PRINT);
}

function getCommentList() {
    global $conn; // Assumiamo che $conn sia la connessione MySQLi già inizializzata

    try {
        $query = "SELECT * FROM commenti";
        $result = $conn->query($query);

        if ($result === false) {
            throw new Exception("Errore nella query: " . $conn->error);
        }

        $comments = $result->fetch_all(MYSQLI_ASSOC);

        if (!empty($comments)) {
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
    } catch (Exception $e) {
        $data = [
            'status' => -1,
            'message' => 'Errore del server: ' . $e->getMessage()
        ];
    }

    return json_encode($data, JSON_PRETTY_PRINT);
}
