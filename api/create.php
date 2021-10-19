<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "PRACTICE_LOG");
    
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

        $sql_email = "SELECT * FROM `users` WHERE 'email'='$email'";
        $result_email = mysqli_query($con, $sql_email);

        $sql_username = "SELECT * FROM `users` WHERE 'username'='$username'";
        $result_username = mysqli_query($con, $sql_username);

        
        //send back response in response array

            if (mysqli_num_rows($result_email) != 0) {    //if email already exists -> prompt forgot password page

                $response["message"] = "Email is already registered";

            } else if (mysqli_num_rows($result_username) != 0) {  //else, if username exists -> prompt for new username

                $response["message"] = "Username is taken";

            } else {    //else, add new user to database -> success message
                
                $sql_add = "INSERT INTO `table name`(`name`, `email`, `username`, `password`) VALUES ('$name','$email','$username','$password')";
                $result = mysqli_query($con, $sql_add);
                
                if ($result) {
                    $response["message"] = "User succesfully created";
                } else {
                    $response["message"] = "User creation failed";
                }
            }


        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>