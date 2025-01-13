<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center text mainColor">Sign-in</h1>
            <form action="./function/signin.php" method="post">
                <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error == "email") {
                ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            L'e-mail inserita non è valida
                        </div>
                    <?php
                    } elseif ($error == "password") {
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            La password deve avere almeno 8 caratteri
                        </div>
                    <?php
                    } elseif ($error == "confirm_password") {
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Le password non coincidono
                        </div>
                    <?php
                    } elseif ($error == "username") {
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Lo username inserito non è disponibile
                        </div>
                    <?php
                    }
                }
                ?>
                <div class="mb-3">
                    <label for="username" class="form-label text lightGray down">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="Inserisci qui il tuo username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text lightGray down">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text lightGray down">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label text lightGray down">Conferma Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" aria-describedby="confirm_password" placeholder="Conferma la tua password">
                </div>
                <button type="submit" class="btn btn-primary button mainColor">Invia</button>
                <div class="text-center">
                    <span class="text lightGray down" >You are welcome !</span>
                </div>
            </form>
        </div>
    </div>
</div>