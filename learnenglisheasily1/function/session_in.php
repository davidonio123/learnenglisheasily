<?php
session_start();
$_SESSION['utente'] = 'ciao';
$sessionid = $_SESSION["utente"];
if($sessionid==""){
    header("location: ./index.php");
    die();
}
?>