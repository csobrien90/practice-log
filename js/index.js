let submit = document.getElementById("login-submit");

let username = document.getElementById("username");
let password = document.getElementById("password");

let storage = localStorage;

submit.addEventListener("click", (event) => {
    event.preventDefault();

    //validate input formats

    fetch("api/login.php", {
        method: "POST",
        body: JSON.stringify({
            "username": username.value,
            "password": password.value 
        })
    })
        .then( res => res.json())
        .then (data => {
            if(!data.message.includes("successful")) {
                document.querySelector('.error-message').innerText = (data.message);
            } else {
                document.querySelector('.error-message').innerText = null;
                storage.setItem('username', data.user_data.username);
                let firstName = data.user_data.name.split(' ')[0];
                storage.setItem('name', firstName);
                window.location.href = 'launch.php';
            }
        });
}); 