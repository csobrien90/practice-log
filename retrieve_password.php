<!DOCTYPE html>
<html lang="en">

<head>
    <title>Retrieve Login Credentials | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <h1>Retrieve Login Credentials | Practice Log</h1>
    </header>

    <main>
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

<script src='js/retrieve_password.js'></script>

</html>