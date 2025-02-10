<?php

header("Content-Type: application/json");

include("./FunctionMain.php");
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

echo getUserList();
die();