let tabella = document.getElementById("user");

fetch("./server/commenti.php", {
    method: "POST"
}).then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.status != 200) {
            tabella.innerHTML = `
            <p>${data.message}</p>
            `;
        } else {
            data = data.data;
            data.forEach(data => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td class="text-center">${data.id}</td>
                    <td>${data.commento}</td>
                    <td class="text-center">${data.id_utente}</td>
                `;
                tabella.appendChild(row);
            });
        }
    })