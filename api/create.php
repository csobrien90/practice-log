<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "API_DATA");
    
    $response = array();

    if($con) {
        
        //get user input from form and set as variables

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $name = $data->name;
        $email = $data->email;
        $username = $data->username;
        $password = $data->password;
        
        //security measures on input


        //query database

        $sql_email = "";
        $result = mysqli_query($con, $sql_email);

        $sql_username = "";
        $result = mysqli_query($con, $sql_username);

        $sql_add = "INSERT INTO `table name`(`name`, `email`, `username`, `password`) VALUES ('$name','$email','$username','$password')";
        $result = mysqli_query($con, $sql_add);
        
        //send back response in response array
            //if email already exists -> prompt forgot password page
            //else, if username exists -> prompt for new username
            //else, add new user to database -> success message

        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>