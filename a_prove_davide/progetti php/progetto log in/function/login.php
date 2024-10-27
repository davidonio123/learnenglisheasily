<?php

/*--------------------
CONNESSIONE CON PDO
--------------------*/

include("./db_connection.php");

/*--------------------
LOGIN/QUERY
--------------------*/

$email=$_POST["email"];
$password=$_POST["password"];

$q = $db->prepare("SELECT * FROM utenti WHERE email = '$email'");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();
if($rows>0){
    while($rows=$q->fetch()){
        if($rows['password']===$password){
            session_start();
            $_SESSION["id"] = $rows['id'];
            header("location: ../welcome.php");
        }else{
            header("location: ../?verification=false");
        }
    }
}else{
    header("location: ../?verification=false");
}

?>