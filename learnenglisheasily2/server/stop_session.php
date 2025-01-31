<?php
header("Content-Type: application/json");

session_start();
if(isset($_SESSION['user'])){
    echo json_encode(['status' => 200,'message' => 'session destroyed']);
    session_destroy();
}else{
    echo json_encode(['status' => -1,'message' => 'session NOT destroyed']);
}