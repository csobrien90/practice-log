<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <h1>Login | Practice Log</h1>
    </header>

    <main>
        <p class="page-description">Sign in to view your practice history and track new sessions.</p>
        <form id="login-form">
            <label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off" required></input>
            <label for="password">Password:</label><input type="password" id="password" name="password" autocomplete="off" required></input>
            <input type="submit" id="login-submit">
        </form>
        <p class="error-message"></p>
        <p>New user? <a href="account_create.php">Create an account.</a></p>
        <p>Forgot password? <a href="retrieve_password.php">Retrieve your login info.</a></p>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>
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
</script>

</html>