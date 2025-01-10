<div class="container mt-4">
    <div class="row justify-content-center">
        <!--            CONTENUTO            -->
        <div class="col-lg-4 d-flex justify-content-center align-items-center">
            <div class="container">
                <h1 class="text-center text mainColor">Learn English easily with us</h1>
                <h2 class="text-center text lightGray m-4">Impara l'inglese giocando e divertendoti con mappe, giochi,
                    quiz, e tanto altro ancora…</h2>
                <div class="row text-center">
                    <div>
                        <button class="button mainColor shadow btn m-1 hover" type="submit">
                            <p>Log in</p>
                        </button>
                        <button class="button mainColorLight btn m-1 hover" type="submit">
                            <p>Sign in</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <!--            IMMAGINE     data-bs-ride="carousel"       data-bs-interval = <intervallo di scorrimento> -->
        <div class="col-lg-7 mt-4">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div id="carosello" class="carousel-inner">
                    <!--            IMMAGINI            -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <style>
        .carousel-inner img {
            width: 100%;
            height: 600px;
        }
    </style>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const carouselImages = document.getElementById('carosello');
        const imageFolder = './asserts/img/carosello_home/';

        //CONTO LE IMMAGINI NELLA CARTELLA  imageFolder

        var nFile = 1;
        function conta() {
            var img = new Image();
            img.src = imageFolder + 'image' + nFile++ + '.jpg';
            img.onload = conta;
            img.onerror = allafinefaiquesto;
        }

        function allafinefaiquesto() {
            nFile -= 2;

            for (let i = 1; i <= nFile; i++) {
                const div = document.createElement('div');
                const active = i === 1 ? ' active' : '';
                div.className = 'carousel-item' + active;
                div.innerHTML = '<img src="' + imageFolder + 'image' + i + '.jpg" class="d-flex" alt="image not found">';
                carouselImages.appendChild(div);
            }

            // alert(nFile);
        }

        conta();
    });
</script>