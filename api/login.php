<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "API_DATA");

    $response = array();

    if($con) {
        
        //get user input from form and set as variables

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $username = $data->username;
        $password = $data->password;
        
        //security measures on input


        //query database

        $sql_username = "";
        $result_username = mysqli_query($con, $sql_username);

        $sql_password = "";
        $result_password = mysqli_query($con, $sql_password);

        //send back response in $response array:
            //if username does not exist
            //if username exists but password does not match
            //if username exists and password matches -> acceptance code and real name of user
        
        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>