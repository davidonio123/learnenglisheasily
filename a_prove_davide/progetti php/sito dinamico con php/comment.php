<?php define('TITLE', "Commento") ?>

<?php include("./layouts/header.php") ?>
<div class="container mt-3" style="min-height: 65vh;">
    <a class="btn btn-primary" href=" <?php if(session_status()==1) session_start(); if(isset($_SESSION['id'])) echo "feedback.php?id=" . $_SESSION['id']; else echo "feedback.php"; ?> ">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        Indietro
    </a>
    <?php
    
    if(isset($_GET['idcurrent'])){
        ?>
        <h1 class="mt-1 mb-3"><?php
        include("./db/db_connection.php");
        $id=$_GET['id'];
        $q = $db->prepare("SELECT * FROM utenti WHERE id='$id'");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $row = $q->fetch();

        echo $row['name'] . " " . $row['surname'];
        ?> ha commentato dicendo:</h1> 
        <p class="mt-3 mb-3"><?php echo $row['comment'] ?></p>
        <?php
        $stringaJson = file_get_contents("./asserts/json/comment.json");
        $utenti = json_decode($stringaJson, true);

        $id = $_GET['idcurrent'];
        $true = true;
        for ($i = 0; $i < count($utenti) && $true; $i++) {
            if ($utenti[$i]['id'] == $id) {
                $true = false;
                $i--;
            }
        }

        array_push($utenti[$i]['commenti_visti'], intval($_GET['id']));

        $stringaJson = json_encode($utenti, true);
        file_put_contents("./asserts/json/comment.json", $stringaJson);
    }else{
        header("location: ./login.php");
    }

    ?>
</div>
<?php include("./layouts/foother.php") ?>
