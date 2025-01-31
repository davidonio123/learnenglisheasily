fetch('http://localhost/progetti/learnenglisheasily/learnenglisheasily2/server/check_session.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.status != 200){
                window.location.href = "login"; // Reindirizzamento manuale
            }
        })