<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Log-in</h1>
            <form action="./function/login.php" method="post">
            <?php
            if(isset($_GET['verification'])){
                $verification=$_GET['verification'];
                if($verification=="false"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Email o password errati, riprova o contatta gli amministratori!
                    </div>
                    <?php
                }
            }
            ?>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>