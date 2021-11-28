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
    $password = $data->password;
    
    //security measures on input

    $username = mysqli_real_escape_string($con, htmlspecialchars($username, ENT_QUOTES));
    $password = mysqli_real_escape_string($con, htmlspecialchars($password, ENT_QUOTES));

    //query database

    $sql_username = "SELECT * FROM USERS WHERE USERNAME='$username'";
    $result_username = mysqli_query($con, $sql_username);
    $row = mysqli_fetch_assoc($result_username);

    //send back response in $response array:

    if (mysqli_num_rows($result_username) == 0) {    //if username does not exist prompt forgot password page

            $response["message"] = "Username not found";

        } else {
            
            $is_password = password_verify($password, $row["PASSWORD"]);

            if ($is_password) {
                //get basic user data and return in $response
                $response["user_data"] = [
                    "username" => $row["USERNAME"],
                    "name" => $row["NAME"],
                    "email" => $row["EMAIL"],
                ];

                $response["message"] = "Login successful";

            } else {

                $response["message"] = "Incorrect password";
            
            }

        }

    echo json_encode($response);
    mysqli_close($con);

?>