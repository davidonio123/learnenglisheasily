function getKeyValueString(array) {
    let result = '';
    array.forEach(obj => {
        for (let key in obj) {
            result += `${key}: ${obj[key]}</br>`;
        }
        result += '-----------------</br>'; // Separatore per chiarezza (facoltativo)
    });

    if(result == '')
        return 'Empty response';
    return result.trim(); // Rimuove spazi bianchi finali
}

document.addEventListener("DOMContentLoaded", () => {
    let risultato = document.getElementById("risultato");
    let invio = document.getElementById("invio");

    invio.addEventListener("click", () => {
        let Query = document.getElementById("query").value;

        fetch('./server/query.php', {
            method: "POST",
            body: JSON.stringify({
                query: Query
            })
        }).then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status != 200) {
                    risultato.innerHTML = data.message;
                    risultato.classList.add("wrong");
                    risultato.classList.remove("success");
                } else {
                    risultato.innerHTML = data.message;
                        risultato.classList.add("success");
                        risultato.classList.remove("wrong");
                    if (data.response != -1) {
                        let output = document.getElementById("risposta");
                        output.innerHTML = JSON.stringify(getKeyValueString(data.response), null, 4);
                    }

                }
            })
    })
});