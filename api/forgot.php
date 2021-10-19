<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "API_DATA");
    
    $response = array();

    if($con) {
        
        //get user input from form and set as variables

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $email = $data->email;

        //security measures on input


        //query database

        $sql_email = "";
        $result = mysqli_query($con, $sql_email);
        
        //send back response in response array
            //if email does not exist -> prompt create user page
            //else, send username and password to $email and send page success message

        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>