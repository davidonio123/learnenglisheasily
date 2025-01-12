<?php
include("./main.php");

// RECUPERO DEI DATI POST
$email = $_POST["email"];
$password = md5($_POST["password"]);

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
        echo 'la password corrisponde </br>';
    } else {
        // email corretta ma pass errata
        echo 'la mail ce ma la pass non corrisponde';
    }
} else {
    // email e pass errati
    header('location: ../login.php?error=email');
}
