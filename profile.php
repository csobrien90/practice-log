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
        <?php include 'header.php' ?>
    </header>

    <main>
        <div id="profile-image-wrapper">
            <input type="file" id="profile-image-upload" title="Upload profile picture">
            <img class="big-profile" src="img/default-profile.png"></img>
        </div>
        <p id="profile-name"></p>
        <p id="profile-email"></p>
        <p id="profile-username"></p>
        <button id="profile-change-password">Change Password</button>
        <button id="profile-delete">Delete User</button>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/profile.js'></script>
<script>
    document.getElementById('profile-name').innerText = `Name: ${localStorage.getItem('full_name')}`;
    document.getElementById('profile-email').innerText = `Email: ${localStorage.getItem('email')}`;
    document.getElementById('profile-username').innerText = `Username: ${localStorage.getItem('username')}`;
</script>

</html>