<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--ANIMATION-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./css/foother.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/header.css">
    <!--SWITCH THEME-->
    <link rel="stylesheet" href="./css/theme.css">


    <title>Admin</title>
</head>

<body data-bs-theme="dark">
    <div class="header">
        <div class="menu-container">
            <div class="container">
                <button class="menu-button">
                    <a href="./user.php" class="text lightGray down">user</a>
                </button>
                <button class="menu-button">
                    <a href="./commenti.php" class="text lightGray down">commenti</a>
                </button>
                <button class="menu-button">
                    <a href="./query.php" class="text lightGray down">query</a>
                </button>
                <button class="menu-button">
                    <a href="./tmpDB.php" class="text lightGray down">tmp DB</a>
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>tmp db: </h2>
        <div class="row">
            <div class="col-md"><button class="btn btn-primary m-3" type="button" id="all">Create all</button></div>
            <div class="col-md"><button class="btn btn-primary m-3" type="button" id="user">Table user</button></div>
            <div class="col-md"><button class="btn btn-primary m-3" type="button" id="commenti">Table commenti</button>
            </div>
        </div>
    </div>
</body>

</html>

<script src="./js/tmpDB.js"></script>