<?php
session_start();
if($_SESSION['id']==""){
    header("location: ../");
}else{
    $_SESSION['id']="";
    header("location: ../");
}

session_destroy();
?>