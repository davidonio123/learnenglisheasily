async function loadUserData() {
    let data = await check(); // Aspetta il risultato della funzione

    if (!data) return; // Evita errori se data è null

    let name = document.getElementById("UserName");
    let surname = document.getElementById("UserSurname");
    let clas = document.getElementById("UserClass");
    let email = document.getElementById("UserEmail");
    
    console.log(data.surname)

    name.innerHTML = data.name;
    surname.innerHTML = data.surname;
    clas.innerHTML = data.class;
    email.innerHTML = data.email;
}

// Chiama la funzione dopo il caricamento della pagina
window.onload = loadUserData;