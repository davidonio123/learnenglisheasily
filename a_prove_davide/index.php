<?php
$ciao = include('./ciao.php');

echo "ciao = " . $ciao . "<br>";

$a = "davidebarretta123@gmail.com";
$oggetto = "email prova sito inglese";
$string = $ciao;


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: davide.barretta21@iti-marconi.edu.it' . "\r\n";

if (mail($a, $oggetto, include('./ciao.php'), $headers)) {
    echo "mail inviata con successo";
} else {
    echo "errore nell invio delle email";
}

die();
?>