console.log("ciao")

document.addEventListener("DOMContentLoaded", function () {
    console.log("Il DOM è pronto!");
    fetch(dominio+'/server/stop_session.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
});
