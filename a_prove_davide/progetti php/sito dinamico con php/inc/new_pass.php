<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Insert code</h1>
            <form action="./function/new_pass.php" method="post">
            <?php
            if(isset($_GET['verification'])){
                $verification=$_GET['verification'];
                if($verification=="equal"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Le password non corrispondono!
                    </div>
                    <?php
                }elseif($verification=="empty"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserire una password valida!
                    </div>
                    <?php
                }
            }
            ?>
            <div class="mb-3 pb-3">
                <label for="password" class="form-label">New password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua nuova password">
            </div>
            <div class="mb-3 pb-3">
                <label for="password" class="form-label">Confirm password</label>
                <input type="password" name="password2" class="form-control" id="password2" aria-describedby="password" placeholder="Conferma la tua password">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>