fetch('http://localhost/progetti/testsimone2/server/stop_session.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })