<?php 

function my_check_pwd($password){
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'; 
    
    if (preg_match($pattern, $password)) { 
        return true; 
    } else { 
        return false;
    } 
}
?>


<?php


/*-------------------
INPUT DATI POST 'email, password'
-------------------*/
$name = $_POST['name'];
$surname = $_POST['surname'];
$class = $_POST['class'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

/*-------------------
CONTROLLI
-------------------*/
//che i campi $email $password non siano vuoti
if(empty($email)){
    header("location: ../signin.php?error=email");
    die();
}elseif(empty($password)){
    header("location: ../signin.php?error=password");
    die();
}elseif(empty($password2)){
    header("location: ../signin.php?error=password");
    die();
}elseif(empty($name)){
    header("location: ../signin.php?error=name");
    die();
}elseif(empty($surname)){
    header("location: ../signin.php?error=surname");
    die();
}elseif(empty($class)){
    header("location: ../signin.php?error=class");
    die();
}

// if(!my_check_pwd($password))
// echo $string;    header("location: ./signin.php?error=password");

/*-------------------
CONNESSIONE MYSQLI
-------------------*/

include("../db/db_connection.php");

//controllo mail gia esistente
$email_q = $db->prepare("SELECT * FROM utenti WHERE email = :email");
$email_q->execute(['email' => $email]);

if ($email_q->rowCount() > 0) {
    header("location: ../signin.php?error=existing");
    die();
}

//controllo password
if($password===$password2){
    echo "password corrisponde";
}else{
    header("location: ../signin.php?error=unequal");
    die();
}
//controllo classe

/*---------------
GENERAZIONE CODICE
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
$_SESSION['password']=$password;
$_SESSION['email']=$email;
$_SESSION['name']=$name;
$_SESSION['surname']=$surname;
$_SESSION['class']=$class;

/*---------------
INVIO DELL EMAIL SMTP
---------------*/

$a = $email;
$oggetto = "learnenglisheasily.net";
$string = "Gentile " . $name . " " .  $surname . " ecco il tuo codice univoco: <br>" . $messaggio;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: davide.barretta123@iti-marconi.edu.it' . "\r\n";

if (mail($a, $oggetto, $string, $headers)) {
    header('location: ../code_singin.php');
} else {
    echo "errore nell invio delle email, riprovare o contattare un amministratore :> <br>";
    echo $string;
}

die();
?>