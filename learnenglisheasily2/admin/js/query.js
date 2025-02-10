function formatData(data) {
    return data.map(person => {
        return `</br>    ID: ${person.id}</br>    Nome: ${person.name} ${person.surname}</br>    Classe: ${person.class}</br>    Email: ${person.email}</br>    Password: ${person.password}</br>`;
    }).join('</br>');
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

                    let output = document.getElementById("risposta");
                    output.innerHTML = JSON.stringify(formatData(data.response), null, 4);


                }
            })
    })
});