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