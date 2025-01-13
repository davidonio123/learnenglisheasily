<?php

// Collegamento al database
include("./main.php");

// Controllo dei dati inseriti
if (isset($_POST['class']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['ceck_password'])) {
    $class = $_POST['class'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ceck = $_POST['ceck_password'];

    // Controllo se i campi sono vuoti

    if($class == "" || $email == "" || $password == "" || $ceck == ""){
        header("Location: ../signin.php?error=empty");
        exit();
    }

    // estrazione del nome e del cognome dall'email
    $user = extractNameFromEmail($email);
    if(isset($user['error'])){
        if($user['error'] == 'invalid_domain'){
            header("Location: ../signin.php?error=invalid_domain"); // dominio della email diverso da iti-marconi.edu.it o itimarconipilla.edu.it
            exit();
        }elseif($user['error'] == 'invalid_name'){
            header("Location: ../signin.php?error=invalid_name"); // formato della email non valido
            exit();
        }
        echo "errore non gestito";
        exit();
    }

    $name = $user['first_name'];
    $surname = $user['last_name'];


  
}
echo "</br>success";