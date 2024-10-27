<?php define("TITLE", "Welcome"); //aggiunge il titolo?>
<?php include("./function/sessionin.php"); //mette la pagina privata?>
<?php include("./layouts/header.php"); //mette l'header?>

<div class="content text-center mt-5 mb-5">
    <h1>Welcome</h1>
    <p>login avvenuto con successo</p>
    <a href="./function/out.php" class="btn btn-primary">Esci</a>
</div>

<?php include("./inc/carosello.php") ?>
<?php include("./layouts/foother.php") ?>