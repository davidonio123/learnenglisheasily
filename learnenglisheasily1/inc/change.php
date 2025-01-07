<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Change password</h1>
            <form action="./page/change_password.php" method="post">
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
                }elseif($verification=="error"){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Non siamo riusciti ad inviare l'e-mail, riprovare piu tardi
                    </div>
                    <?php
                }

            }
            ?>
            <div class="mb-3 pb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>