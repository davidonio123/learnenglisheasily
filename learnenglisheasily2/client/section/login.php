<script src="./asserts/js/stop_session.js" defer></script>
<div class="container mt-5 pt-5 mb-5 pb-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center text mainColor">Log-in</h1>
            <form name="forms" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label text lightGray down">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Inserisci qui la tua e-mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text lightGray down">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Inserisci qui la tua password">
                </div>
                <div class="text lightGray down pb-3" style="color: red;" id="errorDiv"></div>
                <button type="button" class="btn btn-primary button mainColor" id="logInBtn">Invia</button>
                <div class="text-center">
                    <span class="text lightGray red down">Password dimenticata?</span>
                    <a href="./recupera">Recupera</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./asserts/js/login.js"></script>