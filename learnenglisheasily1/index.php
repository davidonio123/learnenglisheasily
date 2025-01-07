<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="./asserts/css/home.css">
    <link rel="stylesheet" href="./asserts/css/scroll-box-commenti.css">

    <!--
    FONT INSERITI:
    font-family: "Montserrat"
    font-family: "Playfair Display"
    font-family: "NTR"
    font-family: "Heebo"
    font-family: "Sanchez"
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=NTR&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!--MENU HAMBURGER-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sanchez:ital@0;1&display=swap" rel="stylesheet">

</head>

<body>
    <!--MENU HAMBURGER-->
    <div id="menu--hamburger">
        <div>
            <a href="./chi-siamo.php">About us</a>
            <a href="#">Games</a>
            <a href="./contatti.php">Contact us</a>
            <a href="<?php if (session_status() == 1) session_start();
                        if (isset($_SESSION['utente'])) {
                            $row = $_SESSION['utente'];
                            echo "feedback.php?id=" . $row['id'];
                        } else echo "feedback.php"; ?> ">Feedback</a>
            <?php
            if (session_status() == 1)
                session_start();
            if (isset($_SESSION['utente'])) {
            ?>
                <a href="./welcome.php">Welcome</a>
            <?php
            } else {
            ?>
                <a href="./login.php">Log in</a>
                <a href="./signin.php">Sign in</a>
            <?php
            }
            ?>
        </div>
    </div>
    <!--COSI BLU IN ALTO A SINISTRA-->
    <div id="container_blu_chiaro"></div>
    <div id="container_blu_scuro"></div>
    <!--BARRA DI NAVIGAZIONE-->
    <div id="intestazione">
        <div id="container">
            <div id="sinistra">
                <a href="./chi-siamo.php">About us</a>
                <a href="#">Games</a>
                <a href="./contatti.php">Contact us</a>
            </div>
            <div id="titolo"> <!--TITOLO/LOGO-->
                <p id="learn">LEARN</p>
                <p id="english">English</p>
                <p id="with_us">with us</p>
            </div>
            <div id="destra">
                <a href=" <?php if (session_status() == 1) session_start();
                            if (isset($_SESSION['utente'])) {
                                $row = $_SESSION['utente'];
                                echo "feedback.php?id=" . $row['id'];
                            } else echo "feedback.php"; ?> ">Feedback</a>
                <?php
                if (session_status() == 1)
                    session_start();
                if (isset($_SESSION['utente'])) {
                ?>
                    <a href="./welcome.php">Welcome</a>
                <?php
                } else {
                ?>
                    <a href="./login.php">Log in</a>
                    <a href="./signin.php">Sign in</a>
                <?php
                }
                ?>
            </div>
        </div>
        <span id="hamburger" class="material-symbols-outlined">
            <svg xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 -960 960 960" width="100%" id="hamburger2">
                <path d="M101.174-216.304v-83.739h758.217v83.739H101.174Zm0-222.044v-83.174h758.217v83.174H101.174Zm0-222.043v-83.74h758.217v83.74H101.174Z" />
            </svg>
        </span>
    </div>
    <!--CONTENUTO PAGINA-->
    <div id="contenuto">
        <div id="hover">
            <!--TESTO CENTRALE-->
            <div>
                <p class="titolo">Welcome</p>
                <p class="paragrafo">You need some help in english?
                    <br>
                    In this web site you can find : videos, exercises, grammar, vocabulary and much more.
                    <br><br>
            </div>
            <!--BOTTONE-->
            <div id="btn">
                <a href="./start here.php" style="text-decoration-line: none;">
                    <p id="bottone"><span>start here</span></p>
                </a>
            </div>
        </div>
    </div>
    <!--            BLOB BLUE           -->
    <img src="./asserts/img/blob.png" id="blob-blue-div" draggable="false">
    <!--            BOK COMMENTI            -->
    <div id="box-con-le-persone">
        <?php
        include("./db/db_connection.php");

        $q = $db->prepare("SELECT * FROM utenti");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        ?>
        <div id="nomi">
            <!--        PERSONE         -->
            <?php
            include("./function/search.php");
            while ($rows  = $q->fetch()) {
                if ($rows['comment'] != "") {
            ?>
                    <div id="commento-box" class="aperto">
                        <div>
                            <div class="commento">
                                <div class="testa">
                                    <img class="immagine" src="./asserts/img/profili/
                                    <?php
                                    $struct = search_row($rows);
                                    echo $struct['profile_image'];
                                    ?> " draggable="false" style="border: 1px solid;">
                                    <div>
                                        <div class="nome-commento"><?php echo $rows['name'] . " " . $rows['surname'] ?></div>
                                        <div class="tag-commento">
                                            <?php
                                            for ($i = 0; $i < count($struct['tags']); $i++)
                                                if ($struct['tags'][$i] != null)
                                                    echo $struct['tags'][$i] . ", ";
                                            ?></div>
                                    </div>
                                </div>
                                <div class="contenuto" style="width: 35vh;">
                                    <p> <?php echo $rows['comment'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!--            LINK            -->
    <div id="pie_di_pagina">
        <div class="link-piccoli">
            <img src="./asserts/img/instagram.png">
            <a href="https://www.instagram.com/carmela.pietrangelo/">@carmela.pietrangelo</a>
        </div>
        <div class="link-piccoli">
            <img src="./asserts/img/instagram.png">
            <a href="https://www.instagram.com/itst_g.marconi_official/">@itst_g.marconi_official</a>
        </div>
        <div class="link-piccoli">
            <img src="./asserts/img/logo-marconi.png">
            <a href="https://iti-marconi.edu.it">itis marconi</a>
        </div>
    </div>
    <!--            PALLE ANIAMTE          -->
    <div id="container-palle">
        <div class="palla-animata" id="grande"></div>
        <div class="palla-animata" id="media"></div>
        <div class="palla-animata" id="piccola"></div>
    </div>
</body>

</html>
<script src="./asserts/js/menu-home.js"></script>
<script src="./asserts/js/scroll-box-commenti.js"></script>