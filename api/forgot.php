<?php

    //connect to database
    $con = mysqli_connect("localhost", "root", "", "practice_log");
    
    $response = array();

    if($con) {
        
        //get user input from form and set as variables

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $email = $data->email;

        //security measures on input


        //query database

        $sql_email = "SELECT username, password FROM `users` WHERE email='$email'";
        $result_email = mysqli_query($con, $sql_email);
        $row = mysqli_fetch_assoc($result_email);
        
        //send back response in response array

        if (mysqli_num_rows($result_email) == 0) {  //if email does not exist, prompt create user page
            
            $response["message"] = "No users found with that email address. <a href='account_create.php'>Create a new account</a>";

        } else {    //send username and password to $email and send page success message
            
            $email_body = "Your login credentials for Practice Log:\n";
            $email_body .= "username: " . $row['username'] . "\npassword: " . $row['password']; 
            mail($email, "Practice Log - Password Recovery", $email_body);
            $response["message"] = "Reminder email has been sent";
    
        }

        echo json_encode($response);
        mysqli_close($con);

    } else {
        $response["message"] = "Connection to database failed";
        echo json_encode($response);
        mysqli_close($con);
    }

?>