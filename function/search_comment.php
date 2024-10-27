<?php

function find_commment($id_current, $id_comment): bool
{
    $stringaJson = file_get_contents("./asserts/json/comment.json");
    $utenti = json_decode($stringaJson, true);

    /*---------------
    RICERCA DELLA TABELLA
    ---------------*/
    $true = true;
    for ($i = 0; $i < count($utenti) && $true; $i++) {
        if ($utenti[$i]['id'] == $id_current) {
            $true = false;
            $i--;
        }
    }

    if(session_status()==1)
        session_start();
    $row = $_SESSION['utente'];

    if ($i == count($utenti)) {
        //echo "utente con id " . $id . " non trovato <br>";
        //CREO LA TABELLA
        array_push($utenti, array(
            'id' => $id_current,
            'tags' => array("studente", $row['class']),
            'commenti_visti' => array(),
        ));
        //echo "utente con id " . $id . " creato <br>";
        //echo "<pre>" . var_export($utenti[$i], true) . "</pre>";

        $stringaJson = json_encode($utenti, true);
        file_put_contents("./asserts/json/comment.json", $stringaJson);
    }

    /*---------------
    RICERCA DELL ID DEL COMMENTO
    ---------------*/

    $true = true;
    $idb = $id_comment;
    $conta = 0;
    for ($j = 0; $j < count($utenti[$i]['commenti_visti']) && $true; $j++) {
        //echo $utenti[$i]['commenti_visti'][$j];
        if ($utenti[$i]['commenti_visti'][$j] != $idb) {
            $conta++;
        }
    }


    if ($conta == count($utenti[$i]['commenti_visti'])) {
        return true;
    }
    return false;
}

function search_row($row)
{
    $stringaJson = file_get_contents("./asserts/json/comment.json");
    $utenti = json_decode($stringaJson, true);

    /*---------------
    RICERCA DELLA TABELLA
    ---------------*/
    $true = true;
    for ($i = 0; $i < count($utenti) && $true; $i++) {
        if ($utenti[$i]['id'] == $row['id']) {
            $true = false;
            $i--;
        }
    }

    if ($i == count($utenti)) {
        //echo "utente con id " . $id . " non trovato <br>";
        //CREO LA TABELLA
        array_push($utenti, array(
            'id' => $row['id'],
            'tags' => array("studente", $row['class']),
            'profile_image' => "default.png",
            'commenti_visti' => array(),
        ));
        //echo "utente con id " . $id . " creato <br>";
        //echo "<pre>" . var_export($utenti[$i], true) . "</pre>";

        $stringaJson = json_encode($utenti, true);
        file_put_contents("./asserts/json/comment.json", $stringaJson);
    }

    return $utenti[$i];
}