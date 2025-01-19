<div class="container mt-4 pt-4">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center text mainColor mb-5">Sign up</h1>
            <form action="./function/signin.php" method="post">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "empty") {
                ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Errore!</strong> Compila tutti i campi.
                        </div>
                    <?php
                    } elseif ($_GET["error"] == "invalid_domain") {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Errore!</strong> Dominio dell email non valido.
                        </div>
                    <?php
                    } elseif ($_GET["error"] == "invalid_name") {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Errore!</strong> Formato dell email non valido.
                        </div>
                    <?php
                    } elseif ($_GET["error"] == "password") {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Errore!</strong> La password non corrisponde.
                        </div>
                    <?php
                    }
                    elseif ($_GET["error"] == "email") {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Errore!</strong> La mail e gia registrata.
                            </div>
                        <?php
                        }
                }
                ?>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="email" class="form-label text lightGray down">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
                    </div>
                    <div class="col-lg-4">
                        <label for="class" class="form-label text lightGray down">Classe</label>
                        <input type="text" name="class" class="form-control" id="class" aria-describedby="class" placeholder="Classe">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text lightGray down">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text lightGray down">Conferma password</label>
                    <input type="password" name="ceck_password" class="form-control" id="ceck_password" aria-describedby="password" placeholder="Reinserisci la tua password">
                </div>
                <button type="submit" class=" btn btn-primary button mainColor">Invia</button>
                <div class="text-center">
                    <span>Hai già un account?</span>
                    <a href="./login.php">Log-in</a>
                </div>
            </form>
        </div>
    </div>
</div>