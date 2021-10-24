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
        
        <select name="time-range">
            <option value="last-week">Last 7 Days</option>
            <option value="last-month">Last 30 Days</option>
            <option value="all">Full History</option>
        </select>

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
    
</script>

</html>