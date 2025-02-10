<?php

header("Content-Type: application/json");

include("./FunctionMain.php");

$data = json_decode(getCommentList());

if($data->status != 200){
    echo json_encode($data);
    die();
}

echo json_encode($data);
die();