<?php

require_once './db/db_connection.php';
function getUserList(){

    global $conn;

    $query = "SELECT * FROM user";
    $query_run = mysqli_query($conn, $query);
    if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message'=> 'user trovati con successo',
                'data' => $res
            ];
            header('HTTP/1.0 200 ok');
            return json_encode($data, JSON_PRETTY_PRINT);


        }else{
            $data = [
                'status' => 404,
                'message'=> 'nessun user trovato'
            ];
            header('HTTP/1.0 404 nessun utente trovato');
            return json_encode($data,JSON_PRETTY_PRINT);
        }

    }else{
        $data = [
            'status' => 500,
            'message'=> 'Internel Server Error'
        ];
        header('HTTP/1.0 500 Internal Server Error');
        echo json_encode($data,JSON_PRETTY_PRINT);
    }
}