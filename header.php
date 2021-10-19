<?php
    
    ($_SERVER["QUERY_STRING"]) ? ($user = $_SERVER["QUERY_STRING"]) : ($user = "Guest");
    echo "<h1>Practice Log</h1>",
        "<p>Hello, $user!</p>";

?>