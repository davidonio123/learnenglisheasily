<?php define("TITLE", "Welcome"); //aggiunge il titolo?>
<?php include("./function/session_in.php"); //mette la pagina privata?>
<?php include("./layouts/header.php"); //mette l'header?>

<div class="content text-center mt-5 mb-5">
    <h1>Welcome</h1>
    <h2>la tua email è: </h2>
    <?php
        if(isset($_GET['utente']))
            echo $_GET['utente'];
        else
            echo "undefined@gmail.com";
    ?>
    <p>login avvenuto con successo</p>
    <a href="./function/session_out.php" class="btn btn-primary">Esci</a>
</div>

<?php include("./inc/carosello.php") ?>
<?php include("./layouts/foother.php") ?>