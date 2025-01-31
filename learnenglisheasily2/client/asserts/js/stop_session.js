document.addEventListener("DOMContentLoaded", function () {
    console.log("Il DOM è pronto!");
    fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/stop_session.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
});
