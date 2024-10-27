<?php

/*---------------
RECUPERO DATI
---------------*/

session_start();

$name=$_SESSION['name'];
$surname=$_SESSION['surname'];
$class=$_SESSION['class'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$CODE=$_SESSION['CODE'];

$codice=$_POST['code'];

/*---------------
CONTROLLO DEL CODICE
---------------*/

if($CODE===$codice)
    echo "il codice corrisponde";
else{
    header("location: ../code_signin?verification=error");
    die();
}


/*-------------------
CREAZIONE ED ESECUZIONE DELLE QUERY
-------------------*/

include("../db/db_connection.php");
$encodpass = md5($password);
$q = "INSERT INTO utenti (name, surname, class, email, password) VALUES ('$name','$surname','$class','$email','$encodpass');";
$risultato = $db->query($q);
if($risultato==false){
    echo "errore nell invio della query, riprova o contatta un amministratore";
    die();
}

header("location: ../login.php?verification=true");



?>