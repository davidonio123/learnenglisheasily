<?php

header("Content-Type: application/json");


include("./db/db_connection.php");
$requestMethod = $_SERVER["REQUEST_METHOD"];

// controllo se il metodo di richiesta e POST se diverso da errore
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
    $query = $data['query'];

    if ($query == "" || $query == null) {
        echo json_encode(['status' => -1, 'message' => 'query non inserita, inserisci prima una query.']);
        die();
    }
} catch (Exception $e) {
    echo json_encode(['status' => -1, 'message' => 'errore.' . $e->getMessage()]);
    die();
}

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['status' => 200, 'message' => 'query eseguita correttamente', 'response' => $response]);
} catch (Exception $e) {
    echo json_encode(['status' => -1, 'message' => 'errore nell esecuzione della query</br>' . $e->getMessage()]);
}