<?php define("TITLE", "Home page"); ?>

<!--HEADER-->
<?php include('./layouts/header.php') ?>

<!--CAROSELLO-->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./asserts/img/1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Sviluppo web</h5>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis veniam eius placeat facilis enim et fugit itaque illum voluptas temporibus nihil doloribus.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./asserts/img/2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Software e app</h5>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis veniam eius placeat facilis enim et fugit itaque illum voluptas temporibus nihil doloribus.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./asserts/img/3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Seo e Web Marketing</h5>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis veniam eius placeat facilis enim et fugit itaque illum voluptas temporibus nihil doloribus.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--/CAROSELLO-->

<!--chi sono-->
<?php include('./inc/chi-sono.php') ?>

<!--SERVIZI-->
<?php include('./inc/servizi.php') ?>

<!--CONTATTI-->
<?php include('./inc/contatti.php') ?>
<!--FOOTHER-->
<?php include('./layouts/foother.php') ?>