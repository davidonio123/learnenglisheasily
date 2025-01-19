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