<div class="container mt-4">
    <div class="row justify-content-center">
        <!--            CONTENUTO            -->
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div class="container">
                <h1 class="text-center text mainColor">Learn English easily with us</h1>
                <h2 class="text-center text lightGray m-4">Impara l'inglese giocando e divertendoti con mappe, giochi, quiz, e tanto altro ancora…</h2>
                <div class="row text-center">
                    <div>
                        <button class="button mainColor shadow btn m-1" type="submit">
                            <p>Log in</p>
                        </button>
                        <button class="button mainColorLight btn m-1" type="submit">
                            <p>Sign in</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
        <!--            IMMAGINE            -->
        <div class="col-7">
            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="carouselImages">
                    <!-- Aggiungere le immagini -->
                </div>

                <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Precedente</span>
                </a>

                <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Successiva</span>
                </a>
            </div>
        </div>
    </div>

    <style>
        .carousel-inner img {
            width: 100%;
            height: auto;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const carouselImages = document.getElementById('carouselImages');
            const imageFolder = './asserts/img/carosello_home/'; 
            // !!! IMPORTANTE !!!
            const imageCount = 4; //Numero di foto inserite nella cartella

            for (let i = 1; i < imageCount; i++) {
                const div = document.createElement('div');
                div.className = i === 1 ? 'carousel-item active' : 'carousel-item';
                div.innerHTML = `<img src="${imageFolder}image${i}.jpg" class="d-block w-100" alt="Image ${i}">`;
                carouselImages.appendChild(div);
            }

            //Intervallo di autoscorrimento
            setInterval(() => {
                const activeItem = document.querySelector('.carousel-item.active');
                const nextItem = activeItem.nextElementSibling || carouselImages.firstElementChild;
                activeItem.classList.remove('active');
                nextItem.classList.add('active');
            }, 3000); //Delay in ms
        });
    </script>
</div>
