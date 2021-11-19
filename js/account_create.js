let submit = document.getElementById("create-submit");

let nameInput = document.getElementById("name");
let email = document.getElementById("email");
let username = document.getElementById("username");
let password = document.getElementById("password");
let confirm = document.getElementById("confirm-password");
let message = document.querySelector('.error-message');

let passwordRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#^@$!%*?&])[A-Za-z\d#^@$!%*?&]{8,}$/

submit.addEventListener("click", (event) => {
    event.preventDefault();

    if (!password.value.match(passwordRegEx)) {
        message.innerHTML = 'Password must contain at least one lowercase letter, uppercase letter, number, and special character';
    } else if (password.value !== confirm.value) {
        message.innerHTML = 'Passwords must match';
    } else {
            
        fetch("api/create.php", {
            method: "POST",
            body: JSON.stringify({
                "name": nameInput.value,
                "email": email.value,
                "username": username.value,
                "password": password.value 
            })
        })
            .then(res => res.json())
            .then(data => {
                message.innerHTML = (data.message);
            });
    }
}); 