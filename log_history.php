<!DOCTYPE html>
<html lang="en">

<head>
    <title>Practice History | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        
        <form>
            <select name="time-range">
                <option value="last-week">Last 7 Days</option>
                <option value="last-month">Last 30 Days</option>
                <option value="all">Full History</option>
            </select>
            <input type="submit" value="Load History" id="load-history">
        </form>

        <table id="log-table"></table>

        <p class="error-message"></p>
        <a href="launch.php">Back to Home Page</a>

    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>

let submit = document.getElementById("load-history");
let table = document.getElementById("log-table");

submit.addEventListener("click", (event) => {
    event.preventDefault();

    //validate input formats

    fetch("api/history.php", {
        method: "POST",
        body: JSON.stringify({
            "username": "testuser"
        })
    })
    .then( res => res.json())
    .then (data => {
        if(!data.message.includes("found")) {
            document.querySelector('.error-message').innerText = (data.message);
        } else {
            document.querySelector('.error-message').innerText = null;
            table.innerHTML = '';
            delete data.message;
            let row;
            let header = document.createElement('TR');
            header.innerHTML = `
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Stop Time</th>
                    <th>Total Time</th>
                    <th>Notes</th>
                </tr>
            `;
            table.appendChild(header);
            for(item in data) {
                row = document.createElement('TR');
                row.innerHTML = `
                    <tr>
                        <td>${data[item]['date']}</td>
                        <td>${data[item]['start_time']}</td>
                        <td>${data[item]['stop_time']}</td>
                        <td>${data[item]['total_time']}</td>
                        <td>${data[item]['notes']}</td>
                    </tr>
                `;
                table.appendChild(row);
            }
        }
    });
});    
</script>

</html>