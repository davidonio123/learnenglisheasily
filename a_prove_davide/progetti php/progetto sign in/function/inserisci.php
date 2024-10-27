<?php

/*-------------------
CONNESSIONE MYSQLI
-------------------*/

include("./db_connection.php");

/*-------------------
INPUT DATI POST 'email, password'
-------------------*/

$email = $_POST['email'];
$password = $_POST['password'];

/*-------------------
CONTROLLI
-------------------*/
//che i campi $email $password non siano vuoti
if(empty($email)){
    header("location: ../?error=email");
    die();
}elseif(empty($password)){
    header("location: ../?error=password");
    die();
}
//controllo mail gia esistente
$q = "SELECT * FROM utenti WHERE email='$email'";
$risultato = $db->query($q);
$array = $risultato->fetch_array();
    
if($array['email']==$email){
    header("location: ../?error=existing");
    die();
}

/*-------------------
CREAZIONE ED ESECUZIONE DELLE QUERY
-------------------*/

$q = "INSERT INTO utenti (email, password) VALUES ('$email','$password');";
$risultato = $db->query($q);
if($risultato==false){
    header("location: ../error.php");
    die();
}

header("location: ../success.php");

?>