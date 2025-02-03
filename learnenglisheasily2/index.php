<?php
header("Content-Security-Policy: script-src 'self' https://cdnjs.cloudflare.com https://cdn.jsdelivr.net; base-uri 'none'; form-action 'none';"); //csp per la Content-Security-Policy (NON MODIFICARE)

$dominio = '/progetti/learnenglisheasily/learnenglisheasily';
$dominio = '';
$request = $_SERVER['REQUEST_URI'];
$request = explode('/', $request); // attenzione salva una stringa vuota che sarebbe lo / iniziale

switch ($request[count($request)-1]) {
    case $dominio . '':
        require __DIR__ . '/client/home.php';
        break;
    case $dominio . 'feedback':
        require __DIR__ . '/client/feedback.php';
        break;
    case $dominio . 'grammar':
        require __DIR__ . '/client/comingsoon.php';
        break;
    case $dominio . 'vocabulary':
        require __DIR__ . '/client/comingsoon.php';
        break;
    case $dominio . 'aboutus':
        require __DIR__ . '/client/aboutus.php';
        break;
    case $dominio . 'comingsoon':
        require __DIR__ . '/client/comingsoon.php';
        break;
    case $dominio . 'login':
        require __DIR__ . '/client/login.php';
        break;
    case $dominio . 'signup':
        require __DIR__ . '/client/signup.php';
        break;
    case $dominio . 'welcome':
        require __DIR__ . '/client/welcome.php';
        break;
    case $dominio . 'recupera':
        require __DIR__ . '/client/recuperaPassword.php';
        break;
    default:
        require __DIR__ . '/client/error404.php';
        echo '</br>RICHIESTA: </br>';
        foreach ($request as $key => $value) {
            echo '</br>' . $key . ' ' . $value . ' ';
        }

// provare ad inmplementare un switch di contesto delle variabili con i metodi post in modo da evitare di switchare agli API di js
} ?>
<script src="./client/asserts/js/theme.js"></script>
