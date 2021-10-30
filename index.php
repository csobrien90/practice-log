<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <form id="login-form">
            <label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off"></input>
            <label for="password">Password:</label><input type="password" id="password" name="password" autocomplete="off"></input>
            <input type="submit" id="login-submit">
        </form>
        <p class="error-message"></p>
        <p>New user? <a href="account_create.php">Create an account.</a></p>
        <p>Forgot password? <a href="retrieve_password.php">Retrieve your login info.</a></p>
        
        <a href="launch.php">TEMPORARILY BYPASS LOGIN</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>
    let submit = document.getElementById("login-submit");

    let username = document.getElementById("username");
    let password = document.getElementById("password");

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
                    console.log(data.message);
                }
            });
    }); 
</script>

</html>