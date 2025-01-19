<?php
// Dati per la connessione al database
include("db_date.php");

try {
    // Creazione della connessione PDO 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Imposta la modalità errore PDO su eccezione
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "connessione riuscita</br></br>";

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
    echo "Tabella creata con successo.</br></br>";

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

    $conn = null;
    echo "Dati inseriti con successo.</br></br>";

    echo "creazione tabella commenti.</br></br>";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Imposta la modalità errore PDO su eccezione
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creazione della tabella
    $sql = "CREATE TABLE IF NOT EXISTS commenti (
        id INT AUTO_INCREMENT PRIMARY KEY,
        commento TEXT,
        id_utente INT
    )";
    
    $conn->exec($sql);
    echo "tabella creata con successo.</br></br>";

    $commenti = [
        [1, 'Ottimo!'],
        [2, 'Prodotto discreto.'],
        [3, 'Non male, ma ci sono alcuni aspetti da migliorare.'],
        [4, 'Servizio perfetto, ma il prodotto non è come mi aspettavo.'],
        [5, 'Ho ricevuto il prodotto in tempo, ma non è molto resistente come speravo.'],
        [6, 'La qualità del prodotto è davvero buona, tuttavia non ero del tutto soddisfatto con l\'imballaggio che avrebbe potuto essere più sicuro.'],
        [7, 'Buona qualità, spedizione veloce e servizio clienti disponibile, ma un po\' costoso per le caratteristiche che offre.'],
        [8, 'Mi aspettavo qualcosa di diverso, ma nel complesso non è male. È stato utile per alcune esigenze, però il prezzo non giustifica tutto.'],
        [9, 'Ottima esperienza, ma l’imballaggio era un po\' danneggiato quando è arrivato, quindi ho dovuto contattare il servizio clienti. Comunque, hanno risolto rapidamente.'],
        [10, 'La spedizione è stata più veloce di quanto pensassi, tuttavia il prodotto non ha soddisfatto pienamente le mie aspettative. La qualità del materiale lascia a desiderare.'],
        [11, 'Un acquisto molto positivo, ma devo dire che mi aspettavo una funzionalità aggiuntiva che non è presente. Comunque, lo consiglio a chi cerca un prodotto base a un buon prezzo.'],
        [12, 'Questo prodotto ha completamente cambiato la mia esperienza quotidiana! È veramente utile, facile da usare e di buona qualità. Sono molto soddisfatto e lo consiglio vivamente.'],
        [13, 'Ho acquistato questo prodotto per regalarlo, ma sono rimasto un po\' deluso dal fatto che non corrispondeva esattamente a quanto descritto sul sito. Poteva essere più rifinito.'],
        [14, 'Non sono per niente soddisfatto dell\'acquisto, il prodotto ha smesso di funzionare dopo poche settimane di utilizzo. Non consiglierei a nessuno di acquistarlo, soprattutto considerando il prezzo.'],
        [15, 'La qualità è mediamente buona, ma il servizio clienti è stato eccezionale! Sono riusciti a risolvere il mio problema in tempo record, quindi in generale sono contento dell\'acquisto.'],
        [16, 'La prima impressione è stata positiva, ma dopo averlo usato per un po\', mi sono accorto che non soddisfa completamente le mie aspettative. È funzionale ma non eccezionale.'],
        [17, 'Il prodotto è ok, ma non proprio quello che cercavo. Funziona bene per il suo scopo, ma avrei preferito una versione con più opzioni. Non lo comprerei di nuovo.'],
        [18, 'Non mi aspettavo che fosse così utile! L\'ho acquistato per un uso specifico e ha superato le mie aspettative in modo sorprendente. Lo sto già usando tutti i giorni senza problemi.'],
        [19, 'La qualità è abbastanza buona, ma la spedizione è stata molto lenta. Se la consegna fosse stata più rapida, sarebbe stata un\'esperienza migliore. Penso che migliorerò la mia valutazione se il servizio migliora.'],
        [20, 'Ho comprato questo prodotto sperando che fosse all\'altezza delle recensioni entusiastiche, ma non è così. Ha alcuni problemi di prestazioni e il design non è come pensavo. Spero che possano migliorarlo.']
    ];

    $stmt = $conn->prepare("INSERT INTO commenti (commento, id_utente) VALUES (:commento, :id_utente)");

    foreach ($commenti as $commento) {
        $stmt->execute(params: [
            ':commento' => $commento[0],
            ':id_utente' => $commento[1]
        ]);
    }

} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}

$conn = null;