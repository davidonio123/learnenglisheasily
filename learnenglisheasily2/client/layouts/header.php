<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo TITLE; ?></title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">
  
  <!-- WOW JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="./client/asserts/js/wow.js"></script>
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./client/asserts/css/foother.css">
  <link rel="stylesheet" href="./client/asserts/css/main.css">
  <link rel="stylesheet" href="./client/asserts/css/header.css">
  <!-- SWITCH THEME CSS -->
  <link rel="stylesheet" href="./client/asserts/css/theme.css">
  

</head>
<body data-bs-theme="light">
  <!-- La navbar usa il tema light: il suo background è impostato uguale a quello del body -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: var(--bs-body-bg);">
    <div class="container-fluid">
      <!-- Switch del tema (al posto del Brand) posizionato a sinistra -->
      <a class="navbar-brand" href="#">
        <label class="ui-switch mb-0">
          <input type="checkbox" id="switch">
          <div class="slider">
            <div class="circle"></div>
          </div>
        </label>
      </a>
      
      <!-- Pulsante Toggler: posizionato a destra in mobile -->
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Menu Collassabile: i link sono centrati -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-center m-2" href="./">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center m-2" href="./feedback">Feedback</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center m-2" href="./comingsoon">Grammar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center m-2" href="./comingsoon">Vocabulary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center m-2" href="./aboutus">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Bootstrap JS (con Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-p4tuZ/5aRRZVmsOpq4/3YthZr+sLJNT88Q1zC4zQz7dp5haJ61+Ul+CAI/14Pp2K" crossorigin="anonymous"></script>
  
  <!-- Script per modificare l'icona del toggler (da hamburger a "X") -->
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      const navbarToggler = document.querySelector('.navbar-toggler');
      const navbarCollapse = document.getElementById('navbarNav');
      
      navbarCollapse.addEventListener('show.bs.collapse', function () {
        // Quando il menu si apre, il pulsante mostra una "X"
        navbarToggler.innerHTML = '&times;';
      });
      navbarCollapse.addEventListener('hide.bs.collapse', function () {
        // Quando il menu si chiude, il pulsante torna a mostrare l'icona hamburger
        navbarToggler.innerHTML = '<span class="navbar-toggler-icon"></span>';
      });
    });
  </script>
</body>
</html>
