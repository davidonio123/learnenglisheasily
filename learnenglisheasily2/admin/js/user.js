let tabella = document.getElementById("user");
let tableHead = document.getElementById("headRow");

fetch("./server/user.php", {
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

            //stampa intestazione tabella
            for (let key in data[0]) {
                const th = document.createElement("th");
                th.classList.add("text-center");
                th.classList.add("col");
                th.innerHTML = key;
                tableHead.appendChild(th);
            }

            //inserimento tutti i dati
            data.forEach(obj => {
                const row = document.createElement("tr");
                let object = ``;
                for (let key in obj) {
                    object += `<td class="text-center">${obj[key]}</td>`;
                }
                row.innerHTML = object;
                tabella.appendChild(row);
            })
        }
    })