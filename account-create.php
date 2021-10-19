<!DOCTYPE html>
<html lang="en">

<head>
    <title>Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <form id="create-account-form">
            <label for="name">Name:</label><input type="text" id="name" name="name" autocomplete="off"></input>
            <label for="email">Email:</label><input type="email" id="email" name="email" autocomplete="off"></input>
            <label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off"></input>
            <label for="password">Password:</label><input type="password" id="password" name="password" autocomplete="off"></input>
            <label for="confirm-password">Confirm Password:</label><input type="password" id="confirm-password" name="confirm-password" autocomplete="off"></input>
            <input type="submit" id="create-submit">
        </form>
        <a href="index.php">Back to login</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>
    let submit = document.getElementById("create-submit");

    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    submit.addEventListener("click", (event) => {
        event.preventDefault();

        //validate input formats

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
            .then (data => console.log(data.message));
    }); 
</script>

</html>