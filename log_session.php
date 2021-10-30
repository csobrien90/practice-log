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
        <form id="session">
            <label for="notes">Notes: </label><textarea id="notes"></textarea>
            <input type="submit" value="Log Session" id="submit-session">
        </form>
        <p class="error-message"></p>
        <a href="launch.php">Back to Home Page</a>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>

    let button = document.querySelector('button');
    let stopwatch = document.querySelector('#stopwatch');
    let submit = document.querySelector('#submit-session');
    let notes = document.querySelector('#notes');
    let timer;
    let now;
    let startDate;
    let restartTime = 0;

    function formatSeconds(time) {
        let hours = '00';
        let seconds = (time % 60).toString().padStart(2, '0');
        let minutes = Math.floor(time / 60).toString().padStart(2, '0');
        if (minutes > 59) {
            hours = Math.floor(minutes / 60).toString().padStart(2, '0');
            minutes = (minues % 60).toString().padStart(2, '0');
        }

        return `${hours}:${minutes}:${seconds}`; 
    }

    button.addEventListener('click', () => {

        if(button.innerHTML === "Start Session") {
            button.innerHTML = "Pause Session";
            startDate = new Date()

            if(!timer) {
                timer = setInterval(() => {
                    now = new Date();
                    elapsedTime = restartTime + Math.floor((now - startDate)/1000);
                    stopwatch.innerHTML = formatSeconds(elapsedTime);    
                }, 1000);
            }

        } else {
            restartTime = elapsedTime;
            button.innerHTML = "Start Session";
            clearInterval(timer);
            timer = null;
        }
    })

    submit.addEventListener("click", (event) => {
        event.preventDefault();

        //validate input formats

        fetch("api/log.php", {
            method: "POST",
            body: JSON.stringify({
                "username": "testuser",
                "date": startDate.toDateString(),
                "start_time": startDate.toTimeString(),
                "stop_time": now.toTimeString(),
                "total_time": stopwatch.innerHTML,
                "notes": notes.value
            })
        })
            .then( res => res.json())
            .then (data => {
                document.querySelector('.error-message').innerText = (data.message);
        });
    });
</script>

</html>