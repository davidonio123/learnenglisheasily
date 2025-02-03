let logIn = document.getElementById("logInBtn");

logIn.addEventListener('click', () => {
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
            console.log('Stato sessione:', data)
            if (data.status != 200) {
                let errorDiv = document.getElementById("errorDiv");

                errorDiv.innerHTML = data.message;
            } else {
                // startare la sessione
                user = data.data;

                fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/start_session.php', {
                    method: "POST",
                    body: JSON.stringify({
                        id: user.id,
                        name: user.name,
                        surname: user.surname,
                        class: user.class,
                        email: user.email,
                        password: user.password
                    })
                }).then(response => response.json())
                    .then(data => {
                        console.log('Stato sessione:', data.user)
                        window.location.href = "welcome"; // Reindirizzamento manuale
                    })
                // window.location.href = "welcome";
            }

        })

    // console.log('attesa di risposta..');
})