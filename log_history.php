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

        <table id="log-table">
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Time Practiced</th>
                <th>Notes</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <a href="launch.php">Back to Home Page</a>

    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script>

let submit = document.getElementById("load-history");

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
        .then (data => console.log(data));
}); 

    
</script>

</html>