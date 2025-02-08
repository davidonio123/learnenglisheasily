document.addEventListener("DOMContentLoaded", () => {
    let errore = document.getElementById("status");
    let invio = document.getElementById("invio");

    invio.addEventListener("click", () => {
        let query = document.getElementById("query").value;
        
        errore.innerHTML = query;
        console.log(query);
    });
});
