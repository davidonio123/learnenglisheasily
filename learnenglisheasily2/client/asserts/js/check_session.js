async function check() {
    try {
        let response = await fetch(dominio+'/server/check_session.php');
        let data = await response.json();
        
        // console.log(data); // Debug per vedere la risposta del server

        if (data.status !== 200) {
            window.location.href = "login"; // Reindirizzamento manuale
            return null; // Evita errori successivi
        }

        return data.user; // Restituisce i dati dell'utente
    } catch (error) {
        console.error("Errore nel controllo della sessione:", error);
        window.location.href = "login";
        return null;
    }
}
