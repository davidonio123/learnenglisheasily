<?php
session_start();
$sessionid = $_SESSION["utente"];
if($sessionid==""){
    header("location: ./index.php");
    die();
}
?>