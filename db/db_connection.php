<?php

//PDO Connection
//include("./db_date.php");

$servername="learnenglisheasily.net";
$username="u235686219_davidechristia";
$passworddb="Ciaomamma_280624";
$dbname="u235686219_utenti";

try{
    $db = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    print "Errore nella connessione al DB!: ". $e->getMessage() ."<br>";
}

?>