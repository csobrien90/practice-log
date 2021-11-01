const currentUser = document.querySelector('.current-user');
let shortName = localStorage.getItem('name');
if(!shortName) shortName = 'Guest';
currentUser.innerText = `Hello, ${shortName}!`;

function logout() {
    localStorage.clear();
    return true;
}