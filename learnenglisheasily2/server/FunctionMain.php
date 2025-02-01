<?php

include("./db/db_connection.php");
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
            return json_encode($data, JSON_PRETTY_PRINT);


        }else{
            $data = [
                'status' => 404,
                'message'=> 'nessun user trovato'
            ];
            return json_encode($data,JSON_PRETTY_PRINT);
        }
    }else{
        $data = [
            'status' => 500,
            'message'=> 'Internel Server Error'
        ];
        echo json_encode($data,JSON_PRETTY_PRINT);
    }
}

function getCommentList(){

    global $conn;

    $query = "SELECT * FROM commenti";
    $query_run = mysqli_query($conn, $query);
    if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message'=> mysqli_num_rows($query_run) . ' commenti trovati con successo',
                'data' => $res
            ];
            return json_encode($data, JSON_PRETTY_PRINT);


        }else{
            $data = [
                'status' => -1,
                'message'=> 'non ci sono comenti :)'
            ];
            return json_encode($data,JSON_PRETTY_PRINT);
        }
    }else{
        $data = [
            'status' => -1,
            'message'=> 'Internel Server Error'
        ];
        echo json_encode($data,JSON_PRETTY_PRINT);
    }
}