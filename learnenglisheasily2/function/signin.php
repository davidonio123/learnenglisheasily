<?php
// Collegamento al database
include("./main.php");

// Controllo dei dati inseriti
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Utilizzo della funzione md5 per criptare la password
    $confirm_password = $_POST['confirm_password'];

    // Controllo della validità dell'e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ./signin.php?error=email");
        exit;
    }

    // Controllo della lunghezza della password
    if (strlen($password) < 8) {
        header("Location: ./signin.php?error=password");
        exit;
    }

    // Controllo della conferma della password
    if ($password != md5($confirm_password)) {
        header("Location: ./signin.php?error=confirm_password");
        exit;
    }

    // Controllo della disponibilità dello username
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $db->prepare($query);
    $result->execute();
    if ($result->rowCount() > 0) {
        header("Location: ./signin.php?error=username");
        exit;
    } else {
        // Inserimento dei dati nel database
        $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = $db->prepare($query);
        $result->execute();
        header("Location: ./login.php?success=registration");
        exit;
    }
}
?>