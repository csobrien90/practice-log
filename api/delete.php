<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "practice_log");

    $response = array();

    if($con) {
        
        //get user input from form and set as variables

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $username = $data->username;
        $password = $data->password;
        
        //security measures on input

        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        
        //query database

        $sql_exists = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result_exists = mysqli_query($con, $sql_exists); 

        $sql_delete = "DELETE FROM `users` WHERE username='$username' AND password='$password'";
        $result_delete = mysqli_query($con, $sql_delete);


        //send back response in $response array:

        if (mysqli_num_rows($result_exists) != 0) {

                $response["message"] = "User account successfully deleted - you will now be automatically logged out";

            } else {

                $response["message"] = "User account deletion failed - incorrect password";
            }

        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>