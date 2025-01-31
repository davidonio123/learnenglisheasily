function login() {

    let email = document.getElementById("email");
    let password = document.getElementById("password");

    fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/login.php', {
        method: "POST",
        body: JSON.stringify({
            email: email.value,
            password: password.value
        })
    })
    .then(response => response.json())
    .then(data => {
        // console.log('Stato sessione:', data)
        if(data.status != 200){
            let errorDiv = document.getElementById("errorDiv");

            errorDiv.innerHTML = data.message;
        }else{
            // startare la sessione
            window.location.href = "welcome";
        }
        
    }).catch(error => console.error('Errore:', error));

    // console.log('attesa di risposta..');
}