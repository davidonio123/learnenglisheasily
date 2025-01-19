<?php

//PDO Connection

include("db_date.php");

try{
    $db = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    print "Errore nella connessione al DB!: ". $e->getMessage() ."<br>";
}

?>