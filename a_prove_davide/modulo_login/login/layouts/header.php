<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asserts/css/style.css">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?PHP echo TITLE ?></title>
    <!--foto prese da unsplash.com--->
</head>
<body>

<!--NAVBAR-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Davidonio's 123</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Home page") echo "active" ?>" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Chi sono") echo "active" ?>" href="login.php">log-in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Servizi") echo "active" ?>" href="servizi.php">Servizi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(TITLE == "Contatti") echo "active" ?>" href="contatti.php">Contatti</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--/NAVBAR-->