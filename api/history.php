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
    
    //get user input from form and set as variables

    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $username = $data->username;
    
    //security measures on input

    $username = mysqli_real_escape_string($con, $username);

    //query database

    $sql_history = "SELECT * FROM SESSIONS WHERE USERNAME='$username'";
    $result_history = mysqli_query($con, $sql_history);

    //send back response in $response array:

    if (mysqli_num_rows($result_history) == 0) {    //if username does not have any logged sessions

        $response["message"] = "Username does not have any logged sessions";

    } else {

        $i = 0;
        while($row = mysqli_fetch_assoc($result_history)) {
            $response[$i]['date'] = $row["DATE"];
            $response[$i]['start_time'] = $row["START_TIME"];
            $response[$i]['stop_time'] = $row["STOP_TIME"];
            $response[$i]['total_time'] = $row["TOTAL_TIME"];
            $response[$i]['notes'] = $row["NOTES"];
            $i++;
        }
        
        $response["message"] = "Session history found and sent";

    }

    echo json_encode($response);
    mysqli_close($con);

?>