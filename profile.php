<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <h1>Edit Profile | Practice Log</h1>
        <p class="current-user"></p>
        <a class="logout" href="index.php" onclick="logout()">Logout</a>
    </header>

    <main>
        <img class="big-profile" src="img/default-profile.png"></img>
        <p id="profile-name">Name: </p>
        <p id="profile-email">Email: </p>
        <p id="profile-username">Username: </p>
        <button id="profile-change-password">Change Password</button>
        <button id="profile-delete">Delete User</button>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/profile.js'></script>

</html>