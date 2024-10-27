<?php
session_start();
$codice = $_SESSION['CODE'];

$code = $_POST['code'];

if($code==$codice){
    header("location: ../new_pass.php");
}else{
    header("location: ../code.php?verification=error");
}
?>