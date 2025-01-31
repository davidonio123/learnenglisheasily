function login() {

    let email = document.getElementById("email");
    let password = document.getElementById("password");

    fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/login.php', {
        method: "POST",
        body: JSON.stringify({
            email: email.value,
            password: password.value
        }).then(function(response) {
            return response.json();
        }).then(function(json) {
            // quando risponde
            dati = json;
            allert();
            console.log(dati);
        })
    })

    console.log('attesa di risposta..');
}