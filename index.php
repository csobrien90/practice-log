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
        <form id="login-form">
            <label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off"></input>
            <label for="password">Password:</label><input type="password" id="password" name="password" autocomplete="off"></input>
            <input type="submit" id="login-submit">
        </form>

        <p>New user? <a href="account-create.php">Create an account.</a></p>
        <p>Forgot password? <a href="retrieve-password.php">Retrieve your login info.</a></p>
        
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>

    //fetch (post) from login.php and change <main> to landing page if login is successful

</script>

</html>