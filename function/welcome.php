<?php
$email = "";
$password = "";
$password2 = "";

if (isset($_POST['email']))
    $email = $_POST['email'];
if (isset($_POST['password']))
    $password = $_POST['password'];
if (isset($_POST['password2']))
    $password2 = $_POST['password2'];

session_start();
$row = $_SESSION['utente'];

include("../db/db_connection.php");

if ($email != "") {
    if ($email === $row['email']) {
        echo "email uguale a quella gia inserita";
        header("location: ../welcome.php?settings=emailins");
        die();
    }

    $q = $db->prepare("SELECT * FROM utenti WHERE email = '$email'");
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);

    $rows = $q->fetch();

    if ($rows != 0) {
        echo "email gia presente nel database";
        header("location: ../welcome.php?settings=emailexs");
        die();
    }

    /*---------------
    INVIO DELL EMAIL SMTP
    ---------------*/

    $a = $email;
    $oggetto = "learnenglisheasily.net";
    $string = "Gentile " . $row['name'] . " " .  $row['surname'] . " email cambiata con successo: <br>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: davide.barretta123@iti-marconi.edu.it' . "\r\n";

    if (!mail($a, $oggetto, $string, $headers)) {
        $email_user = $row['email'];
        $q = $db->prepare("UPDATE utenti SET email = '$email' WHERE email = '$email_user'");
        $q->execute();

        $q = $db->prepare("SELECT * FROM utenti WHERE email = '$email'");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $_SESSION['utente'] = $q->fetch();
        $row = $_SESSION['utente'];
        header("location: ../welcome.php?settings=email");
    } else {
        echo "errore nell invio delle email, riprovare o contattare un amministratore :>";
        header("location: ../welcome.php?settings=inviata");
    }
}

if ($password != "") {
    if ($password === $password2) {
        $email_user = $row['email'];
        $encode_pass = md5($password);
        $q = $db->prepare("UPDATE utenti SET password = '$encode_pass' WHERE email = '$email_user'");
        $q->execute();
        header("location: ../welcome.php?settings=changed");
    }else
        header("location: ../welcome.php?settings=!changed");
}