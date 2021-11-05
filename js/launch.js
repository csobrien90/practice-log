const currentUser = document.querySelector('.current-user');
let shortName = localStorage.getItem('first_name');
if(!shortName) shortName = 'Guest';
currentUser.innerText = `Hello, ${shortName}!`;

function logout() {
    localStorage.clear();
    return true;
}

const arrow = document.getElementById('arrow');
const navMenu = document.getElementById('nav-menu');

navMenu.addEventListener("click", () => {
    if(arrow.style.transform === 'rotate(90deg)') {
        arrow.style.transform = 'rotate(0)';
    } else {
        arrow.style.transform = 'rotate(90deg)';
    }
})