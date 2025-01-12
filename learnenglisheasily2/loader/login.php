<?php

// RECUPERO DEI DATI POST
$email=$_POST["email"];
$password=md5($_POST["password"]);

echo md5(md5('ciao'));
echo '</br>';
echo md5('ciao');

?>