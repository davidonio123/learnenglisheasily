<?php
// Dati per la connessione al database
include("db_date.php");

try {
    // Creazione della connessione PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Imposta la modalità errore PDO su eccezione
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creazione della tabella
    $sql = "CREATE TABLE IF NOT EXISTS user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        class VARCHAR(5) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    $conn->exec($sql);
    echo "Tabella creata con successo.";

    // Inserimento dei dati random
    $students = [
        ["Luca", "Rossi", "4A", "luca.rossi@iti-marconi.edu.it", md5("password1")],
        ["Anna", "Bianchi", "3B", "anna.bianchi@example.com", md5("password2")],
        ["Marco", "Verdi", "2C", "marco.verdi@example.com", md5("password3")],
        ["Giulia", "Neri", "1D", "giulia.neri@example.com", md5("password4")],
        ["Francesco", "Ferrari", "5A", "francesco.ferrari@example.com", md5("password5")],
        ["Elena", "Russo", "3C", "elena.russo@example.com", md5("password6")],
        ["Matteo", "Colombo", "4B", "matteo.colombo@example.com", md5("password7")],
        ["Chiara", "Fontana", "2A", "chiara.fontana@example.com", md5("password8")],
        ["Davide", "Moretti", "1B", "davide.moretti@example.com", md5("password9")],
        ["Sara", "Conti", "5C", "sara.conti@example.com", md5("password10")],
        ["Simone", "Ricci", "4D", "simone.ricci@example.com", md5("password11")],
        ["Valeria", "Marini", "3A", "valeria.marini@example.com", md5("password12")],
        ["Alessandro", "Fabbri", "2D", "alessandro.fabbri@example.com", md5("password13")],
        ["Federica", "Galli", "1C", "federica.galli@example.com", md5("password14")],
        ["Emanuele", "Martini", "5B", "emanuele.martini@example.com", md5("password15")],
        ["Sofia", "Pellegrini", "4C", "sofia.pellegrini@example.com", md5("password16")],
        ["Giovanni", "Costa", "3D", "giovanni.costa@example.com", md5("password17")],
        ["Martina", "Barbieri", "2B", "martina.barbieri@example.com", md5("password18")],
        ["Lorenzo", "Greco", "1A", "lorenzo.greco@example.com", md5("password19")],
        ["Ilaria", "De Luca", "5A", "ilaria.deluca@example.com", md5("password20")],
        ["Andrea", "Bellini", "4A", "andrea.bellini@example.com", md5("password21")]
    ];

    $stmt = $conn->prepare("INSERT INTO students (name, surname, class, email, password) VALUES (:name, :surname, :class, :email, :password)");

    foreach ($students as $student) {
        $stmt->execute(params: [
            ':name' => $student[0],
            ':surname' => $student[1],
            ':class' => $student[2],
            ':email' => $student[3],
            ':password' => $student[4]
        ]);
    }

    echo "Dati inseriti con successo.";

} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}

$conn = null;