<?php
$dominio = '/progetti/learnenglisheasily/learnenglisheasily';
$dominio = '';
$request = $_SERVER['REQUEST_URI'];
$request = explode('/', $request); // attenzione salva una stringa vuota che sarebbe lo / iniziale


switch ($request[4]) {
    case $dominio . '':
        require __DIR__ . '/home.php';
        break;
    case $dominio . 'feedback':
        require __DIR__ . '/feedback.php';
        break;
    case $dominio . 'grammar':
        require __DIR__ . '/comingsoon.php';
        break;

    case $dominio . 'vocabulary':
        require __DIR__ . '/comingsoon.php';
        break;
    case $dominio . 'aboutus':
        require __DIR__ . '/aboutus.php';
        break;
    case $dominio . 'comingsoon':
        require __DIR__ . '/comingsoon.php';
        break;
    case $dominio . 'login':
        require __DIR__ . '/login.php';
        break;
    case $dominio . 'signin':
        require __DIR__ . '/signin.php';
        break;
    default:
        require __DIR__ . '/error404.php';
        echo '</br>RICHIESTA: </br>';
        foreach ($request as $key => $value) {
            echo '</br>' . $key . ' ' . $value . ' ';
        }
}
