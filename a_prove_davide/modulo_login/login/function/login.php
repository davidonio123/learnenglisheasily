<?php

/*--------------------
CONNESSIONE CON PDO
--------------------*/

//PDO Connection
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

/*--------------------
LOGIN
--------------------*/

$email=$_POST["email"];
$password=$_POST["password"];

//Query

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