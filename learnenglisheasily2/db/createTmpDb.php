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
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        class VARCHAR(5) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    $conn->exec($sql);
    echo "Tabella creata con successo.";

    // Inserimento dei dati temporanei
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

    $stmt = $conn->prepare("INSERT INTO user (name, surname, class, email, password) VALUES (:name, :surname, :class, :email, :password)");

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

    echo "creazione tabella commenti";

    // Creazione della tabella
    $sql = "CREATE TABLE commenti (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FOREIGN KEY (id_utente) REFERENCES utenti(id),
        id_utente INT,
        commento TEXT
    )";

    $conn->exec($sql);
    echo "Tabella creata con successo.";

    // Array di frasi di commenti realistici in italiano
    $commenti = [
        "Questo articolo è davvero interessante, grazie per averlo condiviso!",
        "Non sono sicuro di essere d'accordo, ma è un punto di vista interessante.",
        "Grazie mille, mi hai salvato con questa informazione.",
        "Potresti spiegare meglio come funziona questo metodo?",
        "Ottimo lavoro, non vedo l'ora di provare questa soluzione!",
        "Qualcuno sa se ci sono alternative a questo metodo?",
        "Non avevo mai pensato a questa possibilità, grazie per il suggerimento!",
        "Molto utile, grazie! Stavo cercando proprio qualcosa del genere.",
        "Ho provato ma non funziona, forse sbaglio qualcosa?",
        "Questo mi ha chiarito tanti dubbi, davvero utile!",
        "Potrebbe essere migliorato, ma è un buon punto di partenza.",
        "Grazie per la spiegazione, è tutto molto chiaro.",
        "Finalmente una soluzione semplice e chiara!",
        "Non funziona nel mio caso, ma forse è un problema specifico.",
        "Hai altre risorse che potrei consultare?",
        "Perfetto, era proprio quello che cercavo!",
        "Devo dire che è stato davvero illuminante.",
        "Non conoscevo questo trucco, grazie per averlo condiviso.",
        "Hai fatto un ottimo lavoro, complimenti!",
        "Ho una domanda, potresti approfondire un punto?",
        "Questo mi ha aiutato a risolvere un problema che avevo da tempo.",
        "Non è proprio ciò che cercavo, ma è comunque interessante.",
        "Bella idea, potrei usarla in un mio progetto.",
        "Finalmente qualcuno che spiega le cose in modo chiaro!",
        "Grazie per l'aiuto, è stato preziosissimo.",
        "Non avevo mai visto niente del genere, incredibile!",
        "Hai altre idee simili? Questo mi ha incuriosito.",
        "Non pensavo fosse così semplice, fantastico!",
        "Questo metodo è davvero efficace, lo consiglierò.",
        "Puoi condividere qualche esempio pratico?",
        "Non mi è chiaro un passaggio, potresti ripeterlo?",
        "Ottima guida, complimenti per il lavoro!",
        "Questo mi ha risolto un problema che avevo da settimane.",
        "Sono stupito dalla semplicità di questa soluzione.",
        "Qualcuno l'ha provato? Vorrei sentire altre esperienze.",
        "Non ero convinto all'inizio, ma funziona benissimo!",
        "Hai fatto davvero un ottimo lavoro, grazie!",
        "Questo metodo è geniale, non ci avrei mai pensato.",
        "Grazie per aver spiegato tutto nei dettagli.",
        "Mi ha chiarito tanti dubbi, grazie infinite.",
        "Non ci sono parole per ringraziarti, davvero utile!",
        "Puoi fare un tutorial video su questo argomento?",
        "Mi è stato utilissimo, grazie per averlo condiviso.",
        "Ottimo spunto, ci costruirò sopra un progetto!",
        "Finalmente qualcuno che spiega le cose chiaramente.",
        "Un lavoro fantastico, complimenti davvero.",
        "Questo approccio è molto innovativo, bravo!",
        "Sono rimasto colpito dalla semplicità di questa guida.",
        "Non mi convince al 100%, ma lo proverò.",
        "Bella idea, potresti approfondire con altri esempi?",
        "Grazie mille per il supporto, continua così!",
        "Questo è esattamente quello di cui avevo bisogno.",
        "Un metodo semplice e geniale, complimenti.",
        "Grazie per l'aiuto, mi hai davvero salvato.",
        "Posso condividerlo con i miei colleghi? È fantastico.",
        "Questa guida è stata davvero illuminante, grazie mille!"
    ];

    // Array per salvare i risultati
    $resultati = [];

    // Genera 60 commenti con ID casuali
    for ($i = 0; $i < 60; $i++) {
        $idUtente = rand(3, 43); // Genera ID casuale tra 3 e 43
        $commento = $commenti[array_rand($commenti)]; // Scegli un commento casuale
        $resultati[] = [
            "id_utente" => $idUtente,
            "commento" => $commento
        ];
    }

    $stmt = $conn->prepare("INSERT INTO commenti (id_utente, commento) VALUES (:id_utente, :commento)");

    // Mostra i risultati
    foreach ($resultati as $riga) {
        $stmt->execute(params: [
            ':id_utente' => $riga[0],
            ':commento' => $riga[1]
        ]);
        echo "ID Utente: " . $riga["id"] . " - Commento: " . $riga["commento"] . "<br>";
    }
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}

$conn = null;
