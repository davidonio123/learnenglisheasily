<?php

include("./db/db_connection.php");

// RECUPERO DEI DATI DELLA TABELLA COMMENTI

$q = $db->prepare("SELECT * FROM commenti");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();

if ($rows == 0) {
    // nessun commento
    header('location: ./feedback.php?error=no_comment');
    die();
}

$comments = $q->fetchAll();

// DIVISIONE IN COLONNE
$colLen1 = 0;
$colLen2 = 0;
$colLen3 = 0;

// commento col1 col2 e col3 contengono ogni riga del db divisi per lunghezza
$col1 = array();
$col2 = array();
$col3 = array();

$comments = array_reverse($comments);

// DISTRIBUZIONE DEI COMMENTI NELLE COLONNE
foreach ($comments as $commento) {
    if ($colLen1 == min($colLen1, $colLen2, $colLen3)) {
        array_push($col1, $commento);
        $colLen1 += strlen($commento['commento']);
    } elseif ($colLen2 <= $colLen1 && $colLen2 <= $colLen3) {
        array_push($col2, $commento);
        $colLen2 += strlen($commento['commento']);
    } else {
        array_push($col3, $commento);
        $colLen3 += strlen($commento['commento']);
    }
}
// RECUPERO DEI NOMI DEGLI UTENTI

$q = $db->prepare("SELECT * FROM user");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$users = $q->fetchAll();

function getUtente($id, $users)
{
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return [$user['name'], $user['surname'], $user['class']];
        }
    }
}

// STAMPA DEI COMMENTI
echo '<div class="col-md-4">';
foreach ($col1 as $commento) {
    $utente = getUtente($commento['id_utente'], $users);
    $nome = $utente[0];
    $cognome = $utente[1];
    $class = $utente[2];
?>
    <div class="feedback-card">
        <h5 class="text mainColor mid"><?php echo $nome . " " . $cognome . " " ?><span class="text lightGray down"><?php echo $class ?></span></h5>
        <p class="text darkGray down"></p><?php echo $commento['commento'] ?></p>
    </div>
<?php
}
echo "</div>";

echo '<div class="col-md-4">';
foreach ($col2 as $commento) {
    $utente = getUtente($commento['id_utente'], $users);
    $nome = $utente[0];
    $cognome = $utente[1];
    $class = $utente[2];
?>
    <div class="feedback-card">
        <h5 class="text mainColor mid"><?php echo $nome . " " . $cognome . " " ?><span class="text lightGray down"><?php echo $class ?></span></h5>
        <p class="text darkGray down"></p><?php echo $commento['commento'] ?></p>
    </div>
<?php
}
echo "</div>";

echo '<div class="col-md-4">';
foreach ($col3 as $commento) {
    $utente = getUtente($commento['id_utente'], $users);
    $nome = $utente[0];
    $cognome = $utente[1];
    $class = $utente[2];
?>
    <div class="feedback-card">
        <h5 class="text mainColor mid"><?php echo $nome . " " . $cognome . " " ?><span class="text lightGray down"><?php echo $class ?></span></h5>
        <p class="text darkGray down"></p><?php echo $commento['commento'] ?></p>
    </div>
<?php
}
echo "</div>";
