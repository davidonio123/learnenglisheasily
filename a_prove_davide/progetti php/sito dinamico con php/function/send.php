<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$messaggio = $_POST['messaggio'];

//Controlli
if($nome=="" || $email=="" || $messaggio==""){
    header('location: ../contatti.php?invio=empty');
    die();
}

$a = "davidebarretta123@gmail.com";
$oggetto = "Email dal Modulo Contatti del sito web";
$string = "
<h1>Messaggio dal sito:</h1>
<br>
<b>NOME:</b>" . $nome . "<br>
<b>EMAIL:</b>" . $email . "<br>
<b>MESSAGGIO:</b><br>
" . $messaggio . "<br>
<br>
<b>INVIATO: </b>". date('d-m-Y \ H:i:sP') ."
<br>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: davidebarretta123@gmail.com' . "\r\n";

if (mail($a, $oggetto, $string, $headers)) {
    header('location: ../contatti.php?invio=ok');
} else {
    header('location: ../contatti.php?invio=no');
}

echo $nome;

die();

?>