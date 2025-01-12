<?php
include("./main.php");

// RECUPERO DEI DATI POST
$email = $_POST["email"];
$password = md5($_POST["password"]);

// creazione ed esecuzione QUERY
$q = $db->prepare("SELECT * FROM user WHERE email = '$email'");
$q->execute();
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
    echo 'non ce nessuna email';
}
