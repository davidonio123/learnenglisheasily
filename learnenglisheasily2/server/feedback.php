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

$comment = json_decode(getCommentList());
if ($comment->status != 200) {
    echo json_encode($comment);
    die();
}
// echo json_encode($comment->data);

$user = json_decode(getUserList());
if ($comment->status != 200) {
    echo json_encode($user);
    die();
}
// echo json_encode($user);

$comment = $comment->data;
$user = $user->data;

// echo json_encode($comment);

$mergedData['status'] = 200;
$mergedData['message'] = 'commenti uniti con gli utenti';
$mergedData["data"] = [];
foreach ($comment as $c) {
    foreach ($user as $u) {
        if ($u->id === $c->id_utente) {
            $mergedData["data"][] = [
                'name' => $u->name,
                'surname' => $u->surname,
                'class' => $u->class,
                'comment' => $c->commento
            ];
        }
    }
}
 
// Output JSON
echo json_encode($mergedData, JSON_PRETTY_PRINT);