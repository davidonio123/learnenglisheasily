<?php

include("./search_comment.php");

if (session_status() == 1)
    session_start();

$row = $_SESSION['utente'];
if (isset($_FILES['file'])) {
    $upload_path = "../asserts/img/profili/";
    $filename = basename($_FILES['file']['name']);
    $target_file = $upload_path . $filename;

    if ($target_file == $upload_path) {
        $stringaJson = file_get_contents("../asserts/json/comment.json");
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
        if ($utenti[$i]['profile_image'] != "default.png") {
            unlink($upload_path . $utenti[$i]['profile_image']);
            $utenti[$i]['profile_image'] = "default.png";
        }

        $stringaJson = json_encode($utenti, true);
        file_put_contents("../asserts/json/comment.json", $stringaJson);
        header("location: ../welcome.php?settings=success");
        die();
    } else {

        if (file_exists($target_file)) {
            echo "il file è gia presente <br>";
            header("location: ../welcome.php?settings=exsist");
            die();
        }

        if ($_FILES['file']['size'] > 2000000) {
            echo "file troppo grande per essere caricato max 2MB";
            header("location: ../welcome.php?settings=mb");
            die();
        }

        $ext = strtoupper(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($ext != "JPEG" && $ext != "PNG") {
            echo "puoi caricare solo un file jpeg o png";
            header("location: ../welcome.php?settings=exstenction");
            die();
        }

        $img_check = getimagesize($_FILES['file']['tmp_name']);
        if (!$img_check) {
            echo "ci hai provato, questo png non è un immagine";
            header("location: ../welcome.php?settings=!img");
            die();
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            echo "file caricato correttamente";
            header("location: ../welcome.php?settings=success");

            $row = $_SESSION['utente'];

            $stringaJson = file_get_contents("../asserts/json/comment.json");
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

            $utenti[$i]['profile_image'] = $filename;

            $stringaJson = json_encode($utenti, true);
            file_put_contents("../asserts/json/comment.json", $stringaJson);
            die();
        }
        echo "upload fallito";
        header("location: .:/welcome?settings=failed");
        die();
    }
} else {
    header("location: ../welcome.php?settings=image");
    die();
}
