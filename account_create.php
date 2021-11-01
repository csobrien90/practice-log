<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Account | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <h1>Create Account | Practice Log</h1>
        <p class="current-user"></p>
        <a class="logout" href="index.php" onclick="logout()">Logout</a>
    </header>

    <main>
        <h1>Create Account</h1>
        <p class="page-description">Sign up for a free account to start tracking your practice sessions today!</p>
        <form id="create-account-form">
            <label for="name">Name:</label><input type="text" id="name" name="name" autocomplete="off" required></input>
            <label for="email">Email:</label><input type="email" id="email" name="email" autocomplete="off" required></input>
            <label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off" required></input>
            <label for="password">Password:</label><input type="password" id="password" name="password" autocomplete="off" required></input>
            <label for="confirm-password">Confirm Password:</label><input type="password" id="confirm-password" name="confirm-password" autocomplete="off" required></input>
            <input type="submit" id="create-submit">
        </form>
        <p class="error-message"></p>
        <a href="index.php">Back to login</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>

    const currentUser = document.querySelector('.current-user');
    let name = localStorage.getItem('name');
    currentUser.innerText = `Hello, ${name}!`;

    function logout() {
        localStorage.clear();
        return true;
    }

    let submit = document.getElementById("create-submit");

    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let confirm = document.getElementById("confirm-password");
    let message = document.querySelector('.error-message');

    let passwordRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/

    submit.addEventListener("click", (event) => {
        event.preventDefault();

        //validate input formats
        if (!password.value.match(passwordRegEx)) {
            message.innerHTML = 'Password must contain at least one lowercase letter, uppercase letter, number, and special character';
        } else if (password.value !== confirm.value) {
            message.innerHTML = 'Passwords must match';
        } else {
                
            fetch("api/create.php", {
                method: "POST",
                body: JSON.stringify({
                    "name": name.value,
                    "email": email.value,
                    "username": username.value,
                    "password": password.value 
                })
            })
                .then( res => res.json())
                .then (data => {
                    message.innerHTML = (data.message);
                });
        }
    }); 
</script>

</html>