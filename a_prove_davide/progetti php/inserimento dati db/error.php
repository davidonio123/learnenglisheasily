<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erorr page</title>
</head>
<body>
    <h1 style="color: red;">ERRORE</h1><br>
    <p>questa è una pagina di errore, si è veirificato un errore</p><br>
    <?php
        $errore = $_GET['errore'];

        if($errore==="existing"){
            ?>
            <p>email, gia registrata</p>
            <?php
        }elseif($errore==="existing"){
            ?>
            <p>email, gia registrata</p>
            <?php
        }
    ?>
</body>
</html>