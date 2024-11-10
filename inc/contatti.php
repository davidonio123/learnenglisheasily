<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
<!--ALLERT-->
            <?php
                if(isset($_GET['invio'])){
                    if($_GET['invio'] == 'ok'){
                        ?>
                            <div class="alert alert-success text-center" role="alert">
                                E-mail inviata con successo - grazie per averci contattato !
                            </div>
                        <?php
                    }elseif($_GET['invio'] == 'empty'){
                        ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Errore nell'invio della mail - riempire tutti i campi
                            </div>
                        <?php
                    }else{
                        ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Errore nell'invio della mail - riprova piu tardi
                            </div>
                        <?php
                    }
                } 

            ?>  
<!--/ALLERT-->
            <h1 class="text-center">Contatti</h1>
            <form action="./page/send.php" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input name="nome" class="form-control" id="nome" aria-describedby="nome" placeholder="Inserisci qui il tuo nome completo">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
            </div>
            <div class="mb-3">
                <label for="messaggio" class="form-label">Messaggio</label>
                <textarea name="messaggio" class="form-control" id="messaggio" aria-describedby="messaggio" cols="30" rows="10" placeholder="Scrivi qui il tuo messaggio"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div> 