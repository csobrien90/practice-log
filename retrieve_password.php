<!DOCTYPE html>
<html lang="en">

<head>
    <title>Retrieve Login Credentials | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <h1>Retrieve Login Credentials | Practice Log</h1>
        <p class="current-user"></p>
        <a class="logout" href="index.php" onclick="logout()">Logout</a>
    </header>

    <main>
        <h1>Forgot Password</h1>
        <p class="page-description">If there is an account associated with your email, this form will send 
            your username and password.</p>
        <form id="retrieve-password-form">
            <label for="email">Email:</label><input type="email" id="email" name="email" autocomplete="off" required></input>
            <input type="submit" id="forgot-submit">
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
    
    let submit = document.getElementById("forgot-submit");

    let email = document.getElementById("email");

    submit.addEventListener("click", (event) => {
        event.preventDefault();

        //validate input format

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
</script>

</html>