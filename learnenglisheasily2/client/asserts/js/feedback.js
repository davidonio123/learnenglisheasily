fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/feedback.php', {
    method: "POST"
}).then(response => response.json())
    .then(data => {
        // console.log('Stato sessione:', data)
        if (data.status != 200) {
            let error = document.getElementById("error");

            error.innerHTML = data.message;
        } else {
            comment = data.data;
            // console.log('comments: ' + comment[0].name);

            let columns = [document.getElementById("col1"), document.getElementById("col2"), document.getElementById("col3")];

            comment.forEach((comment, index) => {
                // console.log(index)
                let card = document.createElement("div");
                card.classList.add("feedback-card", "wow", "fadeIn", "animate__slower");

                card.innerHTML = `
                    <h5 class="text mainColor mid">
                        <span id="USerName">${comment.name}</span>
                        <span id="UserSurname">${comment.surname}</span>
                        <span class="text lightGray down" id="UserClass">${comment.class}</span>
                    </h5>
                    <p class="text darkGray down" id="USerComment">
                        ${comment.comment}
                    </p>
                `;

                columns[index % 3].appendChild(card);
            });
        }
    })