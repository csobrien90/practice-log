<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recover Credentials | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/retrieve_password.css">
</head>

<body>

    <header>
        <h1>Recover Credentials | Practice Log</h1>
    </header>

    <main>
        <p class="page-description">If there is an account associated with your email, this form will send 
            your username and password.</p>
        <form id="retrieve-password-form">
            <span class="input-line"><label for="email">Email:</label><input type="email" id="email" name="email" autocomplete="off" required></input></span>
            <span class="input-line"><input type="submit" id="forgot-submit"></span>
        </form>
        <p class="error-message"></p>
        <a href="index.php">Back to login</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/retrieve_password.js'></script>

</html>