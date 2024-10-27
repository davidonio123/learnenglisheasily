<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Sign-in</h1>
            <form action="./function/signin.php" method="post">
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="password"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserisci una password
                    </div>
                    <?php
                }elseif($_GET["error"]=="email"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserisci una emali
                    </div>
                    <?php
                }elseif($_GET["error"]=="existing"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    E-mail gia registrata
                    </div>
                    <?php
                }elseif($_GET["error"]=="name"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserire un nome
                    </div>
                    <?php
                }elseif($_GET["error"]=="surname"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserire un cognome
                    </div>
                    <?php
                }elseif($_GET["error"]=="class"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserire una classe valida
                    </div>
                    <?php
                }elseif($_GET["error"]=="unequal"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Le password non corrispondono
                    </div>
                    <?php
                }
            }
            ?>
            <div class="row mb-3">
                <div class="col-lg-5">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Inserisci qui il tuo nome">
                </div>
                <div class="col-lg-5">
                    <label for="surname" class="form-label">Surname:</label>
                    <input type="text" name="surname" class="form-control" id="surname" aria-describedby="surname" placeholder="Inserisci qui il tuo cognome">
                </div>
                <div class="col-lg-2">
                    <label for="class" class="form-label">Class:</label>
                    <input type="text" name="class" class="form-control" id="class" aria-describedby="class" placeholder="Classe">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password2" class="form-control" id="password2" aria-describedby="password" placeholder="Reinserisci la tua password">
            </div>
            <button type="submit" class=" btn btn-primary">Invia</button>
            <div class="text-center">
                <span>Hai già un account?</span>
                <a href="./login.php">Log-in</a>
            </div>
            </form>
        </div>
    </div>
</div>