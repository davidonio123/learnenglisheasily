let tabella = document.getElementById("user");

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
            data.forEach(data => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td class="text-center">${data.id}</td>
                    <td class="text-center">${data.name}</td>
                    <td class="text-center">${data.surname}</td>
                    <td class="text-center">${data.class}</td>
                    <td class="text-center">${data.email}</td>
                    <td class="text-center">${data.password}</td>
                `;
                tabella.appendChild(row);
            }
            );
        }
    })