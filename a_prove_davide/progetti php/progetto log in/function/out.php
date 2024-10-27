<?php
session_start();
if($_SESSION['id']==""){
    header("location: ../?verification=false");
}else{
    $_SESSION['id']="";
    header("location: ../");
}
?>