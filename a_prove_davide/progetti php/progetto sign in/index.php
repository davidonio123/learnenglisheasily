<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento dati</title>
</head>
<body>
    <h1>Sing in</h1>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="password"){
                ?>
                <h1 style="color: red;">inserire una password</h1>
                <?php
            }elseif($_GET["error"]=="email"){
                ?>
                <h1 style="color: red;">inserire una emali</h1>
                <?php
            }elseif($_GET["error"]=="existing"){
                ?>
                <h1 style="color: red;">email gia registrata</h1>
                <?php
            }
        }
    ?>
    <form action="./function/inserisci.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value=""><br>
        <label for="password">password</label>
        <input type="password" name="password" id="password" value=""><br>
        <button type="submit">Invia</button>
    </form>
</body>
</html>