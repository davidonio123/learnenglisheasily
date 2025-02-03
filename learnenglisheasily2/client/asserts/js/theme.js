let switchTheme = document.getElementById("switch");

//mette il tema salvato nella local storage
document.addEventListener("DOMContentLoaded", () => {
    const temaSalvato = localStorage.getItem("theme");
    if (temaSalvato) {
        document.body.setAttribute("data-bs-theme", temaSalvato);
        switchTheme.checked = temaSalvato === "dark";
    }
});

//cambia il tema 
switchTheme.addEventListener("click", () => {
    if (switchTheme.checked) {
        document.body.setAttribute("data-bs-theme", "dark");
        localStorage.setItem("theme", "dark");
    } else {
        document.body.setAttribute("data-bs-theme", "light");
        localStorage.setItem("theme", "light");
    }
});
