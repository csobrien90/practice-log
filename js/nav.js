const arrow = document.getElementById('arrow');
const navMenu = document.getElementById('nav-menu');

navMenu.addEventListener("click", () => {
    if(arrow.style.transform === 'rotate(90deg)') {
        arrow.style.transform = 'rotate(0)';
    } else {
        arrow.style.transform = 'rotate(90deg)';
    }
})