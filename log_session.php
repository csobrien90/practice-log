<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Session | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <button>Start Session</button>
        <p id="stopwatch"></p>
        <form id="submit-session">
            <label for="notes">Notes: </label><textarea id="notes"></textarea>
            <input type="submit">
        </form>
        <a href="launch.php">Back to Home Page</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>
    let button = document.querySelector('button');
    let stopwatch = document.querySelector('#stopwatch');
    button.addEventListener('click', () => {
        if(button.innerHTML === "Start Session") {
            button.innerHTML = "Pause Session";
            stopwatch.innerHTML = "timer goes here";
        } else {
            button.innerHTML = "Start Session";
            stopwatch.innerHTML = "";
        }
    })
</script>

</html>