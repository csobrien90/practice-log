<!DOCTYPE html>
<html lang="en">

<head>
    <title>History | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/log_history.css">
</head>

<body>

    <header>
        <h1>History | Practice Log</h1>
        <?php include 'header.php' ?>
    </header>

    <main>
        <p class="page-description">Select a time period and "Load History" to view past practice sessions.</p>
        <form>
            <select name="time-range" id="time-range">
                <option value="last-week">Last 7 Days</option>
                <option value="last-month">Last 30 Days</option>
                <option value="all">Full History</option>
            </select>
            <input type="submit" value="Load History" id="load-history">
        </form>

        <table id="log-table"></table>

        <p class="error-message"></p>
        
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/log_history.js'></script>
<script src='js/header.js'></script>
<script src='js/nav.js'></script>

</html>