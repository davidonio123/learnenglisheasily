<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Change password</h1>
            <form action="./function/verify.php" method="post">
            <?php
            if(isset($_GET['verification'])){
                $verification=$_GET['verification'];
                if($verification=="empty"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserire una E-mail
                    </div>
                    <?php
                }elseif($verification=="email"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Inserire una E-mail gia registrata
                    </div>
                    <?php
                }
            }
            ?>
            <div class="mb-3 pb-3">
                <label for="code" class="form-label">Insert code</label>
                <input type="txt" name="code" class="form-control" id="code" aria-describedby="code" placeholder="Inserisci qui il codice inviato alla tua email">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>