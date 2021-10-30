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


        //query database

        $sql_username = "SELECT * FROM `users` WHERE username='$username'";
        $result_username = mysqli_query($con, $sql_username);

        $sql_password = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result_password = mysqli_query($con, $sql_password);
        $row = my_sqli_fetch_assoc($result_password);

        //send back response in $response array:

        if (mysqli_num_rows($result_username) == 0) {    //if username does not exist prompt forgot password page

                $response["message"] = "Username not found";

            } else if (mysqli_num_rows($result_password) == 0) {    //if username exists but password does not match

                $response["message"] = "Incorrect password";

            } else {    //if username exists and password matches
                
                //get full user data and return in $response
                $response["user_data"] = [
                    "username" => $row["username"],
                    "name" => $row["name"],
                ];
                $response["message"] = "Login successful";
            }

        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

    
?>