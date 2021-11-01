<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <h1>Welcome | Practice Log</h1>
        <p class="current-user"></p>
        <a class="logout" href="index.php" onclick="logout()">Logout</a>
    </header>

    <main>
        <p class="page-description">Welcome to the free Practice Log tool, created by 
            <a href="http://obrientrombone.com" target="_blank">Chad O'Brien</a>. I hope you enjoy and make good use 
            of this resource. If you have any issues, discover bugs, or wish to offer general feedback, reach out via 
            <a href="http://obrientrombone.com/connect.html" target="_blank">my personal website's contact form</a>.</p>
        <a href="log_session.php">Log New Session</a>
        <a href="log_history.php">View Practice History</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/launch.js'></script>

</html>