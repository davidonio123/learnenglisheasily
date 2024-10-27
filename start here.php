<?php define("TITLE", "Start Here"); ?>

<?php include("./layouts/header.php"); ?>

<div style="max-width: 70%;" class="container mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col" style="min-width: 300px;">
                <div class="card mb-3">
                    <img src="./asserts/img/start_here/communication.jpeg" class="card-img-top" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title">Communication</h5>
                        <p class="card-text">Useful Language to communicate.</p>
                        <a href=" <?php if(session_status()==1) session_start(); if(isset($_SESSION['utente'])) echo "./communication.php"; else echo "./login.php?verification=login"; ?> " class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col" style="min-width: 300px;">
                <div class="card mb-3">
                    <img src="./asserts/img/start_here/vocabulary.jpeg" class="card-img-top" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title">Vocabulary</h5>
                        <p class="card-text">The main lexicon you need to speak english.</p>
                        <a href=" <?php if(session_status()==1) session_start(); if(isset($_SESSION['utente'])) echo "./vocabulary.php"; else echo "./login.php?verification=login"; ?> " class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col" style="min-width: 300px;">
                <div class="card mb-3">
                    <img src="./asserts/img/start_here/grammar3.jpeg" class="card-img-top" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title">Grammar</h5>
                        <p class="card-text">Learn about hosting built for scale and reliability.</p>
                        <a href=" <?php if(session_status()==1) session_start(); if(isset($_SESSION['utente'])) echo "./grammar.php"; else echo "./login.php?verification=login"; ?> " class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./layouts/foother.php"); ?>