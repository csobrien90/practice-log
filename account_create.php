<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Account | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <h1>Create Account | Practice Log</h1>
        <p class="current-user"></p>
        <a class="logout" href="index.php" onclick="logout()">Logout</a>
    </header>

    <main>
        <p class="page-description">Sign up for a free account to start tracking your practice sessions today!</p>
        <form id="create-account-form">
            <label for="name">Name:</label><input type="text" id="name" name="name" autocomplete="off" required></input>
            <label for="email">Email:</label><input type="email" id="email" name="email" autocomplete="off" required></input>
            <label for="username">Username:</label><input type="text" id="username" name="username" autocomplete="off" required></input>
            <label for="password">Password:</label><input type="password" id="password" name="password" autocomplete="off" required></input>
            <label for="confirm-password">Confirm Password:</label><input type="password" id="confirm-password" name="confirm-password" autocomplete="off" required></input>
            <input type="submit" id="create-submit">
        </form>
        <p class="error-message"></p>
        <a href="index.php">Back to login</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/account_create.js'></script>

</html>