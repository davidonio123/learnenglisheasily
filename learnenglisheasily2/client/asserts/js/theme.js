let switchTheme = document.getElementById("switch")

switchTheme.addEventListener("change", ()=> {
    let body = document.body
    if (switchTheme.checked) {
        body.data-bs-theme.remove("light-theme")
        body.data-bs-theme.add("dark-theme")
    } else {
        body.data-bs-theme.remove("dark-theme")
        body.data-bs-theme.add("light-theme")
    }
})