var bodyHeight = document.body.scrollHeight;
var screenHeight = window.innerHeight;
var footer = document.querySelector('footer');
var txtsx = document.querySelector('.text.lightGray.down.p-5.sx');
var txtdx = document.querySelector('.text.lightGray.down.p-5.dx');
if (bodyHeight <= screenHeight) {
    footer.style.position = 'absolute';
    footer.style.bottom = '0';
    footer.style.width = '100%';
    footer.style.height = '121px';
    footer.classList.add('mt-0');
    footer.classList.add('pt-0');
    footer.classList.add('fixed-bottom');
    txtsx.classList.remove('p-5');
    txtdx.classList.remove('p-5');
}