const currentUser = document.querySelector('.current-user');
let shortName = localStorage.getItem('name');
currentUser.innerText = `Hello, ${shortName}!`;

function logout() {
    localStorage.clear();
    return true;
}

let submit = document.getElementById("forgot-submit");

let email = document.getElementById("email");

submit.addEventListener("click", (event) => {
    event.preventDefault();

    fetch("api/forgot.php", {
        method: "POST",
        body: JSON.stringify({
            "email": email.value
        })
    })
        .then( res => res.json())
        .then (data => {
            document.querySelector('.error-message').innerHTML = (data.message);
        });
}); 