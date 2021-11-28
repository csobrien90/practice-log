<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <header>
        <h1>Login | Practice Log</h1>
    </header>

    <main>
        <p class="page-description">Sign in to view your practice history and track new sessions.</p>
        <form id="login-form">
            <span class="input-line"><label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off" required></input></span>
            <span class="input-line password-span">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" autocomplete="off" required></input>
                <?php include 'password_show_hide.php' ?>
            </span>
            <span class="input-line"><input type="submit" id="login-submit" value="Login"></span>
        </form>
        <p class="index-links">New user? <a href="account_create.php">Create an account.</a></p>
        <p class="index-links">Forgot password? <a href="retrieve_password.php">Retrieve your login info.</a></p>
        <p class="error-message"></p>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/index.js'></script>
<script src='js/password_show_hide.js'></script>

</html>