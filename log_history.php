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
            console.log(data);
            console.log(data[0]);
            console.log(data[0]['date']);
            // let html = `
            //     <tr>
            //         <th>Date</th>
            //         <th>Start Time</th>
            //         <th>End Time</th>
            //         <th>Total Time Practiced</th>
            //         <th>Notes</th>
            //     </tr>
            // `;
            // for(let i = 0; i < data.length; i++) {
            //     html += `
            //         <tr>
            //             <td>${data[i]['date']}</td>
            //             <td>${data[i]['start_time']}</td>
            //             <td>${data[i]['stop_time']}</td>
            //             <td>${data[i]['total_time']}</td>
            //             <td>${data[i]['notes']}</td>
            //         </tr>
            //     `
            // }
            // table.innerHTML = html;
        }
    });
});    
</script>

</html>