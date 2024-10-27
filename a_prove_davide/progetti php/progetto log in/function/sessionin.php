<?php
session_start();
$sessionid = $_SESSION["id"];
if($sessionid==""){
    header("location: ../");
}
?>