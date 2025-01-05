<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asserts/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="./asserts/css/foother.css">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?PHP echo TITLE ?></title>
    <!--foto prese da unsplash.com--->
</head>
<body>

<!--NAVBAR-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Home page") echo "active" ?>" aria-current="page" href="./" style="padding:5px 15px 5px 15px;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Chi siamo") echo "active" ?>" href="chi-siamo.php" style="padding:5px 15px 5px 15px;">Chi siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Feedback") echo "active" ?>" href=" <?php if(session_status()==1) session_start(); if(isset($_SESSION['utente'])){ $row=$_SESSION['utente']; echo "feedback.php?id=" . $row['id'];} else echo "feedback.php"; ?> " style="padding:5px 15px 5px 15px;">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Contatti") echo "active" ?>" href="contatti.php" style="padding:5px 15px 5px 15px;">Contatti</a>
        </li>
        <?php
        if(session_status()==1)
          session_start();
        if(isset($_SESSION['utente'])){
          ?>
            <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Welcome") echo "active" ?>" href="welcome.php" style="padding:5px 15px 5px 15px;">Welcome</a>
        </li>
          <?php
        }else{
          ?>
            <li class="nav-item">
              <a class="nav-link <?php if(TITLE == "Login") echo "active" ?>" aria-current="page" href="login.php
              " style="padding:5px 15px 5px 15px;">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(TITLE == "Sign-in") echo "active" ?>" aria-current="page" href="signin.php
              " style="padding:5px 15px 5px 15px;">Sign-in</a>
            </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
<style>
  .active {
        border-left: 1px solid lightgray;
        border-top: 1px solid lightgray;
        border-right: 1px solid lightgray;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }
</style>
<!--/NAVBAR-->