<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Session | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <h1>New Session | Practice Log</h1>
        <?php include 'header.php' ?>
    </header>

    <main>
        <p class="page-description">Tracking your practice session couldn't be easier! Start the timer, practice 
            to your hearts content, and submit with the "Log Session" button - use the optional notes input 
            to keep track of what you practiced, how it went, and whatever else you'll want to remember later.</p>
        <section id="log-section">
            <p id="stopwatch">00:00:00</p>
            <button>Start Session</button>
            <form id="session">
                <label for="notes">Notes: </label><textarea id="notes"></textarea>
                <input type="submit" value="Log Session" id="submit-session">
            </form>
            <p class="error-message"></p>
        </section>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/log_session.js'></script>
<script src='js/header.js'></script>
<script src='js/nav.js'></script>

</html>