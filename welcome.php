<?php define("TITLE", "Welcome"); //aggiunge il titolo
?>
<?php include("./function/session_in.php"); //mette la pagina privata
?>
<?php include("./layouts/header.php"); //mette l'header
?>

<div class="content text-center mt-5 mb-5">
    <h1>Welcome</h1>
    <p>login avvenuto con successo</p>
    <a href="./function/session_out.php" class="btn btn-primary">Esci</a>
</div>
<div class="davide">
    <div class="container davide-container">
        <nav class="navbar navbar-davide navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <ul class="navbar-nav" style="-webkit-box-orient:horizontal; -ms-flex-direction: row; flex-direction: row;">

                    <li class="nav-item">
                        <a class="nav-link <?php if (!isset($_GET['settings'])) echo "active"; ?>" aria-current="page" href="./welcome.php" style="padding:5px 15px 5px 15px;">Profilo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($_GET['settings'])) echo "active"; ?>" href="./welcome.php?settings" style="padding:5px 15px 5px 15px;">Settings</a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="container mb-5">
            <?php
            include("./function/search_comment.php");
            $user = search_row($row);
            if (isset($_GET['settings'])) {
                /*----------------------
            SETTINGS
            ----------------------*/
            ?>
                <div class="row">
                    <?php
                    if ($_GET['settings'] == "exsist") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            Rinominare il file
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "mb") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            File troppo grande MAX 2Mb
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "exstenction") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            Puoi caricare solo un file jpeg o png
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "!img") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            Impossibile caricare l'immagine
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "image") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            Errore
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "emailins") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            L'e-mail inserita è uguale a quella corrente
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "emailexs") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            E-mail gia presente nel database
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "email") {
                    ?>
                        <div class="alert alert-success col-lg-6 offset-lg-3 mt-4" role="alert">
                            E-mail cambiata con successo
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "inviata") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            Errore nell invio dell'e-mail
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "changed") {
                    ?>
                        <div class="alert alert-success col-lg-6 offset-lg-3 mt-4" role="alert">
                            Password cambiata con successo
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "!changed") {
                    ?>
                        <div class="alert alert-danger col-lg-6 offset-lg-3 mt-4" role="alert">
                            Password differenti
                        </div>
                    <?php
                    } else if ($_GET['settings'] == "success") {
                    ?>
                        <div class="alert alert-success col-lg-6 offset-lg-3 mt-4" role="alert">
                            Immagine profilo aggiornata con successo
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row center">
                    <form action="./function/welcome.php" method="post" class="col-lg-6 offset-lg-1 mt-3">
                        <h4>Lasciare vuoti i campi se non si vogliono cambiare</h4>
                        <br>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Password</label>
                            <input type="password" name="password2" class="form-control" id="password2" aria-describedby="password" placeholder="Inserisci qui la tua password">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                    <div class="col-lg-4 offset-lg-1 mt-3 text-center">
                        <h4>Profile image:</h4>
                        <div class="mb-3 p-3">
                            <form action="./function/upload.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input class="form-control col" type="file" id="file" name="file">
                                    <button class="btn btn-primary col-lg-3" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="p-2">
                            <img class="davide-container" src="./asserts/img/profili/<?php echo $user['profile_image']; ?> " alt="image not found" style="width: 17rem; height: 15rem; overflow: hidden;" draggable="false">
                        </div>
                    </div>
                </div>
            <?php
            } else {
                /*----------------------
            PROFILO
            ----------------------*/
            ?>
                <div class="row text-center">
                    <div class="col-lg-5">
                        <h3 class="mb-3"><?php if (session_status() == 2) {
                                                echo $row['name'] . " " . $row['surname'];
                                            }
                                            ?></h3>
                        <h3 class="mb-3">Classe: <?php
                                                    echo $row['class'];
                                                    ?>
                        </h3>
                        <h3 class="mb-3">E-mail corrente: <?php echo $row['email']; ?></h3>
                        <h3>Punteggio: <?php echo $row['punteggio'] . " pt" ?></h3>
                    </div>
                    <div class="col-lg-3 offset-lg-3 pt-4">
                        <h4>Profile image:</h4>
                        <img class="davide-container" src="./asserts/img/profili/<?php echo $user['profile_image']; ?> " alt="image not found" style="width: 17rem; height: 15rem; overflow: hidden;" draggable="false">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include("./layouts/foother.php") ?>
<style>
    .davide-container {
        border-color: lightgray;
        border: solid 1px;
        padding: 0px;
        border-radius: 20px;
        z-index: 999;
    }

    .navbar-davide {
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }
    .davide{
        padding: 10px;
        padding-bottom: 30px;
    }
</style>