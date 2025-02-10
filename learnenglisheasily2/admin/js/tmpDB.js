let Button_all = document.getElementById("all");
let Button_user = document.getElementById("user");
let Button_commenti = document.getElementById("commenti");

Button_all.addEventListener("click", ()=>{
    fetch('./server/tmpDB.php', {
        method: "POST",
        body: JSON.stringify({
            request: "all"
        })
    }).then(response => response.json())
    .then(data =>{
        console.log(data);
    })
})


Button_user.addEventListener("click", ()=>{
    fetch('./server/tmpDB.php', {
        method: "POST",
        body: JSON.stringify({
            request: "user"
        })
    }).then(response => response.json())
    .then(data =>{
        console.log(data);
    })
})

Button_commenti.addEventListener("click", ()=>{
    fetch('./server/tmpDB.php', {
        method: "POST",
        body: JSON.stringify({
            request: "all"
        })
    }).then(response => response.json())
    .then(data =>{
        console.log(data);
    })
})