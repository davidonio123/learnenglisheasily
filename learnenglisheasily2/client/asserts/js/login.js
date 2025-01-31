function login() {

    let email = document.getElementById("email");
    let password = document.getElementById("password");

    fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/readDb.php', {
        method: "POST",
        body: JSON.stringify({
            email: email.value,
            password: password.value
        }).then(function(response) {
            return response.json();
        }).then(function(json) {
            // quando risponde
            dati = json;

            console.log(dati);
        })
    })
}