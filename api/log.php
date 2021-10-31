<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "practice_log");
    
    $response = array();

    if($con) {
        
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

        $username = mysqli_real_escape_string($con, $username);
        $date = mysqli_real_escape_string($con, $date);
        $start_time = mysqli_real_escape_string($con, $start_time);
        $stop_time = mysqli_real_escape_string($con, $stop_time);
        $total_time = mysqli_real_escape_string($con, $total_time);
        $notes = mysqli_real_escape_string($con, $notes);

        //query database

        $sql_log = "INSERT INTO `sessions`(`username`, `date`, `start_time`, `stop_time`, `total_time`, `notes`) VALUES ('$username','$date','$start_time','$stop_time', '$total_time', '$notes')";
        $result = mysqli_query($con, $sql_log);
        
        if ($result) {
            $response["message"] = "Session succesfully created";
        } else {
            $response["message"] = "Session creation failed";
        }
    
        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>