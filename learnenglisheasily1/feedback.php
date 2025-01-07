<?php define("TITLE", "Feedback") ?>

<?php include("./layouts/header.php") ?>
<div class="container">
    <div class="row">
        <?php
        include("./db/db_connection.php");
        $q = $db->prepare("SELECT * FROM utenti WHERE comment != ''");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $q->rowCount();

        if ($rows > 0) {
            $suff = "There are ";
            if ($rows == 1)
                $suff = "There is ";
        ?>
            <div class="container text-center mt-3 mb-3">
                <h1><?php echo $suff . $rows ?> comment</h1>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <?php
            if (isset($_GET['verification'])) {
                $verification = $_GET['verification'];
                if ($verification == "empty") {
            ?>
                    <div class="alert alert-danger mt-3 mb-3" role="alert">
                        Commento non valido!
                    </div>
                <?php
                } elseif ($verification == "true") {
                ?>
                    <div class="alert alert-success mt-3 mb-3" role="alert">
                        Commento aggiunto con successo
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="row row_center" style="min-height: 50vh;">
        <?php
        if ($rows > 0) {
            include("./function/search.php");
            while ($rows = $q->fetch()) {
        ?>
                <div class="card m-3" style="width: 18rem; height: fit-content;">

                    <img src="./asserts/img/profili/<?php
                                                    $struct = search_row($rows);
                                                    echo $struct['profile_image'];
                                                    ?> " class="card-img-top" alt="immagine non trovata" draggable="false" style="width: 17rem; height: 15rem; overflow: hidden;">

                    <div class="card-body">
                        <h5 class="card-title" style="width: max-content;"><?php echo $rows['name'] . ' ' . $rows['surname'] ?>
                            <?php
                            if (isset($_GET['id'])) {
                                if (find_commment($_GET['id'], $rows['id'])) {
                            ?>
                                    <span class="badge text-bg-secondary">New</span>
                                <?php
                                }
                            } else {
                                ?>
                                <span class="badge text-bg-secondary">New</span>
                            <?php
                            }
                            ?>
                        </h5>
                        <p class="card-text" style="height: 2.95rem; overflow: hidden;"><?php echo $rows['comment'] ?></p>
                        <a href="./comment.php?id=<?php echo $rows['id'];
                                                    if (isset($_GET['id'])) {
                                                        echo "&idcurrent=" . $_GET['id'];
                                                    } ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="container text-center">
                <h1>Non ci sono ancora commenti...</h1>
            </div>
        <?php
        }

        if (isset($_GET['id'])) {
            if (session_status() == 1)
                session_start();
            $row = $_SESSION['utente'];
        ?>
            <form class="card m-3" style="width: 18rem; height: fit-content;" action="./page/new_comment.php" method="post">
                <div style="height: 15rem; overflow: hidden;">
                    <img src="./asserts/img/profili/<?php
                                                    $struct = search_row($row);
                                                    echo $struct['profile_image'];
                                                    ?> " class="card-img-top" alt="immagine non trovata" style="width: 17rem; height: 15rem; overflow: hidden;" draggable="false">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php
                                            echo $row['name'] . " " . $row['surname'];
                                            ?></h5>
                    <textarea name="comment" class="form-control" id="comment" aria-describedby="comment" cols="30" rows=2" placeholder="Scrivi qui il tuo commento..."></textarea>
                    <button class="btn btn-primary mt-1" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        Add comment
                    </button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</div>
<?php

if (!isset($_GET['id'])) {
?>
    <div class="container">
        <h5 class="text-center">Esegui il login per aggiungere un commento</h5>
    </div>
<?php
}

?>
<div class="mb-3"></div>
<style>
    @media (max-width: 1000px) {
        .row_center{
        justify-content:center;
    }
    }
</style>
<?php include("./layouts/foother.php") ?>