<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <form id="retrieve-password-form">
            <label for="email">Email:</label><input type="email" id="email" name="email" autocomplete="off"></input>
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
                document.querySelector('.error-message').innerText = (data.message);
            });
    }); 
</script>

</html>