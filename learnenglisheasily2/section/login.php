<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center text mainColor">Log-in</h1>
            <form action="#" method="post">
                <?php
                if (isset($_GET['verification'])) {
                    $verification = $_GET['verification'];
                    if ($verification == "false") {
                ?>
                        <div class="alert alert-danger" role="alert">
                            Email o password errati, riprova o contatta gli amministratori!
                        </div>
                    <?php
                    } elseif ($verification == "true") {
                    ?>
                        <div class="alert alert-success" role="alert">
                            Sign-in avvenuto con successo, effettua il log-in
                        </div>
                    <?php
                    } elseif ($verification == "login") {
                    ?>
                        <div class="alert alert-success" role="alert">
                            Esegui il log-in prima di continuare 😊
                        </div>
                <?php
                    }
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
                    <span class="text lightGray down" >Password dimenticata?</span>
                    <a href="./change_password.php">Recupera</a>
                </div>
            </form>
        </div>
    </div>
</div>