<?php
$dominio = '/progetti/learnenglisheasily/learnenglisheasily';
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case $dominio.'/':
        require __DIR__.'/home.php';
        break;
    default:
        echo 'error 404 page not found';
}