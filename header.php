<?php
    $header = `
        <p class="current-user"></p>
        <a class="profile-link" href="profile.php">Edit Profile</a>
        <a class="logout" href="index.php" onclick="logout()">Logout</a>
    `;
    echo $header;
?>