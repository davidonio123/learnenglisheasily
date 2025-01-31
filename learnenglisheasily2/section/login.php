<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center text mainColor">Log-in</h1>
            <form action="./function/login.php" method="post">
                <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error == "empty") {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Errore!</strong> Inserire prima tutti i campi.
                        </div>
                    <?php
                    } elseif ($error == "email") {
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <strong>Errore!</strong> L'email non e registrata, effettua prima il login.
                        </div>
                    <?php
                    } elseif ($error == "wrong_password") {
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <strong>Errore!</strong> Password errata.
                        </div>
                    <?php
                    }
                } elseif (isset($_GET["success"])) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <strong>Successo!</strong> Stai per essere indirizzato alla pagina welcome.
                    </div>
                <?php
                }
                ?>
                <div class="mb-3">
                    <label for="email" class="form-label text lightGray down">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text lightGray down">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
                </div>
                <button type="submit" class="btn btn-primary button mainColor">Invia</button>
                <div class="text-center">
                    <span class="text lightGray down">Password dimenticata?</span>
                    <a href="#">Recupera</a>
                </div>
            </form>
        </div>
    </div>
</div>