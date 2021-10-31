<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "practice_log");

    $response = array();

    if($con) {
        
        //get user input from form and set as variables

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $username = $data->username;
        
        //security measures on input

        $username = mysqli_real_escape_string($con, $username);

        //query database

        $sql_history = "SELECT * FROM `sessions` WHERE username='$username'";
        $result_history = mysqli_query($con, $sql_history);

        //send back response in $response array:

        if (mysqli_num_rows($result_history) == 0) {    //if username does not have any logged sessions

            $response["message"] = "Username does not have any logged sessions";

        } else {

            $i = 0;
            while($row = mysqli_fetch_assoc($result_history)) {
                $response[$i]['date'] = $row["date"];
                $response[$i]['start_time'] = $row["start_time"];
                $response[$i]['stop_time'] = $row["stop_time"];
                $response[$i]['total_time'] = $row["total_time"];
                $response[$i]['notes'] = $row["notes"];
                $i++;
            }
            
            $response["message"] = "Session history found and sent";

        }

        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

?>