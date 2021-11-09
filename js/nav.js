const arrow = document.getElementById('arrow');
const navMenu = document.getElementById('nav-menu');
const nav = document.querySelector('nav');

navMenu.addEventListener("click", () => {
    if(arrow.style.transform === 'rotate(90deg)') {
        arrow.style.transform = 'rotate(0)';
        nav.style.maxHeight = '0px';
    } else {
        arrow.style.transform = 'rotate(90deg)';
        nav.style.maxHeight = '160px';
    }
})