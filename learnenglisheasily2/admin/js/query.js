document.addEventListener("DOMContentLoaded", () => {
    let errore = document.getElementById("status");
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
                errore.innerHTML = data.message;

                if(data.status == 200){
                    let risultato = document.getElementById("risultato");

                    risultato.innerHTML = data.data[0];
                }
            })
    })
});