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
            
            if($rows>0){
                $suff = "There are ";
                if($rows == 1)
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
            if(isset($_GET['verification'])){
                $verification=$_GET['verification'];
                if($verification=="empty"){
                    ?>
                    <div class="alert alert-danger mt-3 mb-3" role="alert">
                    Commento non valido!
                    </div>
                    <?php
                }elseif($verification=="true"){
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
    <div class="row" style="min-height: 50vh;">
        <?php
            if($rows>0){
                while($rows=$q->fetch()){
                    ?>
                    <div class="card m-3" style="width: 18rem; height: fit-content;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rows['name'] . ' ' . $rows['surname'] ?><?php
                                $stringaJson = file_get_contents("./asserts/json/comment.json");
                                $utenti = json_decode($stringaJson, true);

                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $true = true;
                                    for ($i = 0; $i < count($utenti) && $true; $i++) {
                                        if ($utenti[$i]['id'] == $id) {
                                            $true = false;
                                            $i--;
                                        }
                                    }

                                    if ($i == count($utenti)) {
                                        //echo "utente con id " . $id . " non trovato <br>";
                                        array_push($utenti, array (
                                            'id' => $id,
                                            'commenti_visti' => 
                                            array (
                                            ),
                                        ));
                                        //echo "utente con id " . $id . " creato <br>";
                                        //echo "<pre>" . var_export($utenti[$i], true) . "</pre>";

                                        $stringaJson = json_encode($utenti, true);
                                        file_put_contents("./asserts/json/comment.json", $stringaJson);
                                    }
                                    
                                    $true = true;
                                    $idb = $rows['id'];
                                    $conta = 0;
                                    for($j = 0; $j < count($utenti[$i]['commenti_visti']) && $true; $j++){
                                        //echo $utenti[$i]['commenti_visti'][$j];
                                        if($utenti[$i]['commenti_visti'][$j]!=$idb){
                                            $conta++;
                                        }
                                    }

                                    if($conta==count($utenti[$i]['commenti_visti'])){
                                        ?>
                                        <span class="badge text-bg-secondary">New</span>
                                        <?php
                                    }

                                }else{
                                    ?>
                                        <span class="badge text-bg-secondary">New</span>
                                    <?php
                                }
                            ?></h5>
                            <p class="card-text" style="height: 3rem; overflow: hidden;"><?php echo $rows['comment'] ?></p>
                            <a href="./comment.php?id=<?php echo $rows['id']; if(isset($_GET['id'])){ echo "&idcurrent=" . $_GET['id'];} ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="container text-center">
                    <h1>Non ci sono ancora commenti...</h1>
                </div>
                <?php
            }
        ?>
        <?php
        if(isset($_GET['id'])){
            ?>
            <form class="card m-3" style="width: 18rem; height: fit-content;" action="./function/comment.php" method="post">
                <div class="card-body">
                    <h5 class="card-title"><?php
                        include("./db/db_connection.php");
                        $id = $_GET['id'];
                        $q = $db->prepare("SELECT * FROM utenti WHERE id = '$id'");
                        $q->execute();
                        $q->setFetchMode(PDO::FETCH_ASSOC);
                        $row = $q->fetch();

                        echo $row['name'] . " " . $row['surname'];
                    ?></h5>
                    <textarea name="comment" class="form-control" id="comment" aria-describedby="comment" cols="30" rows=2" placeholder="Scrivi qui il tuo commento..."></textarea>
                    <button class="btn btn-primary mt-1" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
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

if(!isset($_GET['id'])){
    ?>
    <div class="container">
        <h5 class="text-center">Esegui il login per aggiungere un commento</h5>
    </div>
    <?php
}

?>
<div class="mb-3"></div>
<?php include("./layouts/foother.php") ?>