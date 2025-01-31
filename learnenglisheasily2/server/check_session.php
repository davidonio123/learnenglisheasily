<?php
session_start();
if (isset($_SESSION['user']['id']) && isset($_SESSION['user']['name']) && isset($_SESSION['user']['surname']) && isset($_SESSION['user']['class']) && isset($_SESSION['user']['email']) && isset($_SESSION['user']['password'])) {
    echo json_encode(['status' => 200, 'message' => 'session active', 'user' => $_SESSION['user']]);
} else {
    echo json_encode(['status' => -1, 'message' => 'no session']);
} 