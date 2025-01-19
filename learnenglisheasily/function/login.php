<?php

use function PHPSTORM_META\type;

include("./main.php");

// RECUPERO DEI DATI 
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($email == "" || $password == "") {
        // email o password non inseriti
        header('location: ../login.php?error=empty');
        die();
    }
} else {
    // email o password non inseriti
    header('location: ../index.php');
    die();
}

// creazione ed esecuzione QUERY
$q = $db->prepare("SELECT * FROM user WHERE email = '$email'");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();


if ($rows > 0) {
    $rows = $q->fetch();
    if ($rows['password'] === md5($password)) {
        // email e pass corretti
        header('location: ../login.php?success');
    } else {
        // email corretta ma pass errata
        header('location: ../login.php?error=wrong_password');
    }
} else {
    // email e pass errati
    header('location: ../login.php?error=email');
    
}
