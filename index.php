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

<script src='js/index.js'></script>

</html>