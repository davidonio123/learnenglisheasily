async function loadUserData() {
    fetch('./server/check_session.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);

            if (data.status != 200) {
                window.location.href = "login";
            } else {
                let name = document.getElementById("UserName");
                let surname = document.getElementById("UserSurname");
                let clas = document.getElementById("UserClass");
                let email = document.getElementById("UserEmail");

                data = data.user;   

                name.innerHTML = data.name;
                surname.innerHTML = data.surname;
                clas.innerHTML = data.class;
                email.innerHTML = data.email;
            }
        })
}

// Chiama la funzione dopo il caricamento della pagina
window.onload = loadUserData;