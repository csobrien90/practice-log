const currentUser = document.querySelector('.current-user');
let shortName = localStorage.getItem('name');
currentUser.innerText = `Hello, ${shortName}!`;

function logout() {
    localStorage.clear();
    return true;
}