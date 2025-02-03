let switchTheme = document.getElementById("switch")

document.getElementById("switch").addEventListener("click", ()=> {
    if (switchTheme.checked) {
        document.body.setAttribute("data-bs-theme", "dark");
    } else {
        document.body.setAttribute("data-bs-theme", "light");
    }
})