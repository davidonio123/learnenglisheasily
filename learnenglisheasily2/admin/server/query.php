<?php

header("Content-Type: application/json");

include("./db/db_connection.php");

$requestMethod = $_SERVER["REQUEST_METHOD"];

// Controllo se il metodo di richiesta è POST, altrimenti restituisce un errore
if ($requestMethod != "POST") {
    $data = [
        'status' => -1,
        'message' => $requestMethod . ' method not allowed'
    ];
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode($data);
    die();
}

$input = file_get_contents("php://input");
$data = json_decode($input, true);

try {
    $query = $data['query'] ?? '';

    if (empty($query)) {
        echo json_encode(['status' => -1, 'message' => 'Query non inserita, inserisci prima una query.']);
        die();
    }
} catch (Exception $e) {
    echo json_encode(['status' => -1, 'message' => 'Errore: ' . $e->getMessage()]);
    die();
}

try {
    // Esegui la query
    $result = $conn->query($query);

    // Se la query è una SELECT, recupera i risultati
    if ($result && strpos(strtoupper($query), 'SELECT') === 0) {
        $response = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode([
            'status' => 200,
            'message' => 'Query eseguita correttamente',
            'response' => $response
        ]);
    } else if ($result) {
        // Se la query non è una SELECT (ad esempio INSERT, UPDATE, DELETE)
        echo json_encode([
            'status' => 200,
            'message' => 'Query eseguita correttamente, nessun risultato da restituire',
            'response' => -1
        ]);
    } else {
        throw new Exception("Errore nell'esecuzione della query: " . $conn->error);
    }

} catch (Exception $e) {
    echo json_encode([
        'status' => -1,
        'message' => 'Errore nell\'esecuzione della query: ' . $e->getMessage()
    ]);
}
