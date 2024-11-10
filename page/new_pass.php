<?php

$password1 = $_POST['password'];
$password2 = $_POST['password2'];

if($password1==""){
    header("location: ../new_pass.php?verification=empty");
    die();
}

if($password1!==$password2){
    header("location: ../new_pass.php?verification=equal");
    die();
}

include("../db/db_connection.php");

session_start();
$email=$_SESSION['email'];

$encodepass = md5($password1);

$q = "UPDATE utenti SET password = '$encodepass' WHERE email = '$email'";
$risultato = $db->query($q);
if($risultato==false){
    echo "errore nell invio della query, riprova o contatta un amministratore";
    die();
}
header("location: ../login.php")
?>