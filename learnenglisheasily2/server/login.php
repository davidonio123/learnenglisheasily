<?php

// header("Content-Type: application/json");

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

// prende tutti gli utenti da database
$users = json_decode(getUserList());

if ($users->status != 200) {
    // echo json_encode($users);
    echo json_encode(['status' => $users->status, 'message' => $users->message]);
    die();
}


// echo json_encode($users);
// echo 'nome dell utente: '.$users->data[0]->name;
// input dei file post
$input = file_get_contents("php://input");
$data = json_decode($input, true);

$email = $data['email'];
$password = $data['password'];

if ($email == "" || $password == "") {
    if ($email == "") {
        if ($password == "") {
            echo json_encode(['status' => -1, 'message' => 'Nessun campo inserito!']);
            die();
        }
        echo json_encode(['status' => -1, 'message' => 'Inserisci la e-mail']);
        die();
    }
    echo json_encode(['status' => -1, 'message' => 'Inserisci la password']);
    die();
}

$password = md5($password);
// cerca se esiste l'utente
for($i=0;$i<count($users->data); $i++){
    if($users->data[$i]->email == $email && $users->data[$i]->password == $password){
        echo json_encode(['status'=> 200,
                                'message'=> 'OK',
                                'data' => [
                                    'id' => $users->data[$i]->id,
                                    'name' => $users->data[$i]->name,
                                    'surname' => $users->data[$i]->surname,
                                    'class' => $users->data[$i]->class,
                                    'email' => $users->data[$i]->email,
                                    'password' => $users->data[$i]->password
                                ]]);
        die();
    }

    if($users->data[$i]->email == $email){
        echo json_encode(['status'=> -1, 'message'=> 'password non corretta']);
        die();
    }
}

echo json_encode(['status'=> -1, 'message'=> 'E-mail non registrata effettua il login o riprova']);
die();