<?php 

/*---------------
CONTROLLI
---------------*/

$email = $_POST['email'];

session_start();

$_SESSION['email']=$email;

if($email==""){
    header("location: ../change_password.php?verfication=empity");
    die();
}

include("../db/db_connection.php");

/*---------------
GENERATORE QUERY
---------------*/

$q = $db->prepare("SELECT * FROM utenti WHERE email = '$email'");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();
if($rows>0){
    echo "email trovata <br>";
}else{
    header("location: ../change_password.php?verification=email");
    die();
}

/*---------------
GENERATORE CODICE
---------------*/

$characters = 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890';
$messaggio='';
$i=0;
while($i<6){
    $messaggio .= $characters[mt_rand(0,strlen($characters)-1)];
    $i++;
}
session_start();
$_SESSION['CODE']=$messaggio;

/*---------------
INVIO DELL EMAIL SMTP
---------------*/

$a = $email;
$oggetto = "NOME DEL SITO";
$string = $messaggio;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: davide.barretta123@iti-marconi.edu.it' . "\r\n";

if (mail($a, $oggetto, $string, $headers)) {
    header('location: ../code.php');
} else {
    echo "errore nell invio delle email, riprovare o contattare un amministratore :>";
}

die();

?>