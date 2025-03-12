<?php

header("Content-Type: application/json");
include("./db/db_connection.php");

function user($conn)
{
    // Creazione della tabella
    $sql = "CREATE TABLE IF NOT EXISTS user (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            surname VARCHAR(50) NOT NULL,
            class VARCHAR(5) NOT NULL,
            email VARCHAR(100) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
    $conn->query($sql);

    // Inserimento dei dati temporanei
    $students = [
        ["Luca", "Rossi", "4A", "luca.rossi@iti-marconi.edu.it", md5("ciaomamma")],
        ["Anna", "Bianchi", "3B", "anna.bianchi@example.com", md5("ciaomamma")],
        ["Marco", "Verdi", "2C", "marco.verdi@example.com", md5("ciaomamma")],
        ["Giulia", "Neri", "1D", "giulia.neri@example.com", md5("ciaomamma")],
        ["Francesco", "Ferrari", "5A", "francesco.ferrari@example.com", md5("ciaomamma")],
        ["Elena", "Russo", "3C", "elena.russo@example.com", md5("ciaomamma")],
        ["Matteo", "Colombo", "4B", "matteo.colombo@example.com", md5("ciaomamma")],
        ["Chiara", "Fontana", "2A", "chiara.fontana@example.com", md5("ciaomamma")],
        ["Davide", "Moretti", "1B", "davide.moretti@example.com", md5("ciaomamma")],
        ["Sara", "Conti", "5C", "sara.conti@example.com", md5("ciaomamma")],
        ["Simone", "Ricci", "4D", "simone.ricci@example.com", md5("ciaomamma")],
        ["Valeria", "Marini", "3A", "valeria.marini@example.com", md5("ciaomamma")],
        ["Alessandro", "Fabbri", "2D", "alessandro.fabbri@example.com", md5("ciaomamma")],
        ["Federica", "Galli", "1C", "federica.galli@example.com", md5("ciaomamma")],
        ["Emanuele", "Martini", "5B", "emanuele.martini@example.com", md5("ciaomamma")],
        ["Sofia", "Pellegrini", "4C", "sofia.pellegrini@example.com", md5("ciaomamma")],
        ["Giovanni", "Costa", "3D", "giovanni.costa@example.com", md5("ciaomamma")],
        ["Martina", "Barbieri", "2B", "martina.barbieri@example.com", md5("ciaomamma")],
        ["Lorenzo", "Greco", "1A", "lorenzo.greco@example.com", md5("ciaomamma")],
        ["Ilaria", "De Luca", "5A", "ilaria.deluca@example.com", md5("ciaomamma")],
        ["Andrea", "Bellini", "4A", "andrea.bellini@example.com", md5("ciaomamma")],
        ["Camilla", "Orlandi", "3B", "camilla.orlandi@example.com", md5("ciaomamma")],
        ["Filippo", "Serra", "2C", "filippo.serra@example.com", md5("ciaomamma")],
        ["Alessia", "Ruggieri", "1D", "alessia.ruggieri@example.com", md5("ciaomamma")],
        ["Gabriele", "Cattaneo", "5A", "gabriele.cattaneo@example.com", md5("ciaomamma")],
        ["Laura", "Monti", "3C", "laura.monti@example.com", md5("ciaomamma")],
        ["Tommaso", "Leone", "4B", "tommaso.leone@example.com", md5("ciaomamma")],
        ["Cecilia", "Pagani", "2A", "cecilia.pagani@example.com", md5("ciaomamma")],
        ["Nicola", "Ferraro", "1B", "nicola.ferraro@example.com", md5("ciaomamma")],
        ["Alice", "Marchetti", "5C", "alice.marchetti@example.com", md5("ciaomamma")],
        ["Samuele", "Rinaldi", "4D", "samuele.rinaldi@example.com", md5("ciaomamma")],
        ["Giada", "Bianco", "3A", "giada.bianco@example.com", md5("ciaomamma")],
        ["Davide", "Guerra", "2D", "davide.guerra@example.com", md5("ciaomamma")],
        ["Beatrice", "Lombardi", "1C", "beatrice.lombardi@example.com", md5("ciaomamma")],
        ["Michele", "Baroni", "5B", "michele.baroni@example.com", md5("ciaomamma")],
        ["Isabella", "Vitale", "4C", "isabella.vitale@example.com", md5("ciaomamma")],
        ["Leonardo", "Piras", "3D", "leonardo.piras@example.com", md5("ciaomamma")],
        ["Vanessa", "Amato", "2B", "vanessa.amato@example.com", md5("ciaomamma")],
        ["Pietro", "Fontanesi", "1A", "pietro.fontanesi@example.com", md5("ciaomamma")],
        ["Elisabetta", "Fiorini", "5A", "elisabetta.fiorini@example.com", md5("ciaomamma")]
    ];

    $stmt = $conn->prepare("INSERT INTO user (name, surname, class, email, password) VALUES (?, ?, ?, ?, ?)");

    foreach ($students as $student) {
        $stmt->bind_param("sssss", $student[0], $student[1], $student[2], $student[3], $student[4]);
        $stmt->execute();
    }
}

function commenti($conn)
{
    // Creazione della tabella
    $sql = "CREATE TABLE IF NOT EXISTS commenti (
            id INT AUTO_INCREMENT PRIMARY KEY,
            commento TEXT,
            id_utente INT
        )";
    $conn->query($sql);

    $commenti = [
        [1, 'Buono.'],
        [2, 'Prodotto molto utile per il mio lavoro quotidiano.'],
        [3, 'Non male, ma alcune caratteristiche non sono come descritte sul sito.'],
        [4, 'Ottimo prodotto, consegna rapida e servizio clienti eccellente. Consigliatissimo!'],
        [5, 'Ho ricevuto il prodotto rapidamente, ma l\'imballaggio era piuttosto fragile e si è leggermente danneggiato durante il trasporto.'],
        [6, 'La qualità è buona, ma il prezzo è un po\' alto rispetto a quanto ci si potrebbe aspettare da un prodotto di questa categoria.'],
        [7, 'Buono per l\'uso quotidiano. Non è il massimo in termini di durabilità, ma per il prezzo è più che accettabile.'],
        [8, 'Non sono del tutto soddisfatto, ma per il prezzo è accettabile. Potrebbe essere migliorato in alcuni aspetti tecnici.'],
        [9, 'Esperienza complessivamente positiva, ma ho trovato il design poco pratico. Le istruzioni potrebbero essere più dettagliate per facilitare l’uso.'],
        [10, 'La spedizione è stata veloce, ma l’articolo presenta un difetto evidente. Avrei preferito maggiore attenzione al controllo qualità.'],
        [11, 'Prodotto eccellente. Supera le aspettative in termini di funzionalità e design. Sono pienamente soddisfatto del mio acquisto e lo consiglio vivamente.'],
        [12, 'L’ho acquistato per un regalo ed è stato molto apprezzato.'],
        [13, 'La qualità non è come speravo, ma il design è bello e moderno.'],
        [14, 'Completamente insoddisfatto, il prodotto si è rotto dopo pochi giorni. Non lo ricomprerei.'],
        [15, 'Buona qualità, ma il servizio clienti potrebbe essere più veloce e reattivo alle richieste.'],
        [16, 'Il prodotto è funzionale e ben progettato, ma mancano alcune caratteristiche importanti che avrebbero reso l\'esperienza migliore.'],
        [17, 'Non è esattamente quello che cercavo, ma funziona bene per usi occasionali. Non lo consiglio per un uso professionale intensivo.'],
        [18, 'Prodotto fantastico! L’ho usato per diverse settimane e sono davvero entusiasta delle sue prestazioni. Consigliato a tutti.'],
        [19, 'La qualità è discreta, ma la spedizione è stata davvero troppo lenta. Se il servizio fosse migliorato, l’esperienza sarebbe stata migliore.'],
        [20, 'Il prodotto non ha soddisfatto pienamente le recensioni entusiaste che avevo letto. Tuttavia, ha alcune qualità che potrebbero risultare utili in determinati contesti.'],
        [7, 'Un prodotto che consiglio senza riserve. Ottima qualità e facilità d\'uso.'],
        [25, 'Consegna rapida, ottimo imballaggio e prodotto perfettamente funzionante.'],
        [3, 'Il prodotto si è dimostrato all’altezza delle aspettative per un uso generico. Non eccelle, ma va bene.'],
        [12, 'Funziona come promesso.'],
        [15, 'Non mi aspettavo che fosse così resistente! Lo sto usando da mesi e sembra ancora nuovo. Ottimo acquisto!'],
        [10, 'Servizio clienti eccellente, hanno risolto subito un problema che avevo riscontrato con il prodotto.'],
        [30, 'Prodotto mediocre. Ha una durata limitata e il design è troppo basilare. Avrei preferito spendere di più per una qualità superiore.'],
        [18, 'Assolutamente fantastico! Ha superato le mie aspettative sotto ogni aspetto, sia per la qualità dei materiali che per la facilità d’uso.'],
        [5, 'Perfetto per principianti, ma non molto adatto a usi avanzati.'],
        [40, 'Non lo consiglio a chi cerca qualità superiore. È un prodotto base.'],
        [22, 'Ho avuto difficoltà a configurarlo, ma una volta impostato funziona bene.'],
        [11, 'Un prodotto utilissimo per chi viaggia spesso. È compatto e facile da trasportare. Consiglio vivamente.'],
        [36, 'Un’esperienza di acquisto molto positiva! Spedizione rapida e prodotto eccellente.'],
        [19, 'La batteria non dura quanto dichiarato, ma per il resto sono soddisfatto.'],
        [17, 'Il prodotto è arrivato in anticipo rispetto alla data prevista e ha soddisfatto tutte le mie aspettative. Lo consiglio.'],
        [33, 'Materiali di qualità. Tuttavia, il design potrebbe essere migliorato per renderlo più pratico.'],
        [29, 'Non lo consiglio. Ho riscontrato difetti che lo rendono poco utilizzabile.'],
        [13, 'Acquisto soddisfacente. Il rapporto qualità-prezzo è molto buono. Lo consiglio.'],
        [8, 'Perfetto sotto ogni aspetto! Non ho trovato alcun difetto.'],
        [24, 'Servizio clienti impeccabile. Hanno risolto un problema in tempi rapidissimi. Molto soddisfatto.'],
        [37, 'Troppo costoso per quello che offre. La qualità è discreta, ma non vale il prezzo.'],
        [16, 'Ideale per chi cerca un prodotto economico e funzionale. Non aspettatevi prestazioni elevate, ma fa il suo dovere.']
    ];

    $stmt = $conn->prepare("INSERT INTO commenti (commento, id_utente) VALUES (?, ?)");

    foreach ($commenti as $commento) {
        $stmt->bind_param("si", $commento[1], $commento[0]);
        $stmt->execute();
    }
}

try {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    if ($data["request"] == "all") {
        user($conn);
        commenti($conn);
    } else if ($data["request"] == "user") {
        user($conn);
    } else if ($data["request"] == "commenti") {
        commenti($conn);
    }

    echo json_encode(['status' => 200, 'message' => 'Operazione completata con successo.']);
} catch (Exception $e) {
    echo json_encode(['status' => -1, 'message' => 'Errore del database: ' . $e->getMessage()]);
}

$conn->close();
