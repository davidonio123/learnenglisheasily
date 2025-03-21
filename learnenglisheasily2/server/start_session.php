<?php
header("Content-Type: application/json");

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$session = false;

if (isset($_SESSION)) {
    session_destroy();
    $sesison = true;
}

session_start();

$_SESSION['user']['id'] = $data["id"];
$_SESSION['user']['name'] = $data["name"];
$_SESSION['user']['surname'] = $data["surname"];
$_SESSION['user']['class'] = $data["class"];
$_SESSION['user']['email'] = $data["email"];
$_SESSION['user']['password'] = $data["password"];

echo json_encode([
    'status' => 200,
    'message' => 'session started',
    'user' => $_SESSION['user'],
    'session_destroy()' => $session
]);
