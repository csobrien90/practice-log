const buttonSelector = document.getElementsByClassName('show-hide');
const showHideButtons = [...buttonSelector];

showHideButtons.forEach(node => node.addEventListener('click', (e) => {
    let input = e.target.previousElementSibling;
    let button = e.target;
    if(input.type === "password") {
        input.type = "text";
        button.style.color = "red";
    } else {
        input.type = "password";
        button.style.color = "black";
    }
}))