<?php

session_start();

$comment = $_POST['comment'];
$id = $_SESSION['id'];

echo $id . "<br>";

if($comment == NULL){
    header("location: ../feedback.php?id=$id&verification=empty");
    die();
}

include("../db/db_connection.php");

$q = $db->prepare("SELECT * FROM utenti WHERE id = '$id'");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);

$row = $q->fetch();

if($row['comment']!=''){
    echo "commento gia esistente, aggiornare commento";
}

$q = $db->prepare("UPDATE utenti SET comment = '$comment' WHERE id = '$id'");
$q->execute();

header("location: ../feedback.php?id=$id&verification=true");

?>