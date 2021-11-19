<?php

    //connect to database
    include "../../inc/dbinfo.inc";

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

    $response = array();
    
    // Throw error if connection failed

    if(mysqli_connect_errno()) {
        $response["message"] = "Connection to database failed: " . mysqli_connect_error();
        echo json_encode($response);
        mysqli_close($con);
        die();
    }
    
    $database = mysqli_select_db($con, DB_DATABASE);
    
    verify_sessions_table($con, DB_DATABASE);

    //get user input from form and set as variables

    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $username = $data->username;
    $date = $data->date;
    $start_time = $data->start_time;
    $stop_time = $data->stop_time;
    $total_time = $data->total_time;
    $notes = $data->notes;
    
    //security measures on input

    $username = mysqli_real_escape_string($con, htmlspecialchars($username, ENT_QUOTES));
    $date = mysqli_real_escape_string($con, htmlspecialchars($date, ENT_QUOTES));
    $start_time = mysqli_real_escape_string($con, htmlspecialchars($start_time, ENT_QUOTES));
    $stop_time = mysqli_real_escape_string($con, htmlspecialchars($stop_time, ENT_QUOTES));
    $total_time = mysqli_real_escape_string($con, htmlspecialchars($total_time, ENT_QUOTES));
    $notes = mysqli_real_escape_string($con, htmlspecialchars($notes, ENT_QUOTES));

    //query database

    $sql_log = "INSERT INTO SESSIONS (USERNAME, DATE, START_TIME, STOP_TIME, TOTAL_TIME, NOTES) VALUES ('$username','$date','$start_time','$stop_time', '$total_time', '$notes')";
    $result = mysqli_query($con, $sql_log);
    
    if ($result) {
        $response["message"] = "Session succesfully created";
    } else {
        $response["message"] = "Session creation failed";
    }

    echo json_encode($response);
    mysqli_close($con);
    
    //functions to verify and build table 

    function verify_sessions_table($connection, $dbName) {
        if(!table_exists("SESSIONS", $connection, $dbName)) {
            $query = "CREATE TABLE SESSIONS (
                ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                USERNAME VARCHAR(45),
                DATE VARCHAR(45),
                START_TIME VARCHAR(45),
                STOP_TIME VARCHAR(45),
                TOTAL_TIME VARCHAR(45),
                NOTES VARCHAR(20000)
            )";
      
            if(!mysqli_query($connection, $query)) {
                $response["message"]= 'Error creating table.';
                echo json_encode($response);
                mysqli_close($connection);
                die();
            }
        }
    }

    function table_exists($tableName, $connection, $dbName) {
        $t = mysqli_real_escape_string($connection, $tableName);
        $d = mysqli_real_escape_string($connection, $dbName);
      
        $checktable = mysqli_query($connection,
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");
      
        if(mysqli_num_rows($checktable) > 0) return true;
      
        return false;
      }
?>