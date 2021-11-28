<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Profile | Practice Log</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>

    <header>
        <div class="header-wrapper">
        <h1>My Profile | Practice Log</h1>
        <?php include 'header.php' ?>
    </header>

    <main>
        <div id="user-info-wrapper">
            <div id="profile-image-wrapper">
                <input type="file" id="profile-image-upload" title="Upload profile picture">
                <img class="big-profile" src="img/default-profile.png"></img>
            </div>
            <section id="user-info">
                <p id="profile-name"></p>
                <p id="profile-email"></p>
                <p id="profile-username"></p>
                <button id="profile-delete">Delete User</button>
            </section>
        </div>
        <section id="delete-confirmation">
            <p id="confirm-delete-message" style="display: none;">Enter your password to confirm you wish to 
                permanently delete this account. Note: To retain stored sessions, create a new account with 
                the same username.</p>
            <input type="password" id="confirm-delete-password">
            <input type="submit" id="confirm-delete" value="Confirm Delete User">
        </section>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

</body>

<script src='js/profile.js'></script>
<script src='js/header.js'></script>
<script src='js/nav.js'></script>

</html>