<?php

use function PHPSTORM_META\type;

include("./main.php");

// RECUPERO DEI DATI POST
if ($_POST["password"] =="") {
    // password non inserita
    header('location: ../login.php?error=empty_password');
    die();
}
$email = $_POST["email"];
$password = md5($_POST["password"]);

$q = $db->prepare("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
$q->execute();
$r = $q->fetch(PDO::FETCH_ASSOC);
if ($r>0) {
    echo 'trovata una riga';
}

// creazione ed esecuzione QUERY
echo '</br>PREPARAZIONE QUERY...</br>';
$q = $db->prepare("SELECT * FROM user WHERE email = '$email'");
echo '</br>QUERY PREPARATA</br>';
$q->execute();
echo '</br>QUERY ESEGUITA</br>';
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();


if ($rows > 0) {
    $rows = $q->fetch();
    if ($rows['password'] === $password) {
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
