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

    $email = $data->email;

    //security measures on input
    
    $email = mysqli_real_escape_string($con, htmlspecialchars($email, ENT_QUOTES));

    //query database

    $sql_email = "SELECT USERNAME, PASSWORD FROM USERS WHERE EMAIL='$email'";
    $result_email = mysqli_query($con, $sql_email);
    $row = mysqli_fetch_assoc($result_email);
    
    //send back response in response array

    if (mysqli_num_rows($result_email) == 0) {  //if email does not exist, prompt create user page
        
        $response["message"] = "No users found with that email address. <a href='account_create.php'>Create a new account</a>";

    } else {    //send username and password to $email and send page success message
        
        $email_body = "Your login credentials for Practice Log:\n";
        $email_body .= "username: " . $row['USERNAME'] . "\npassword: " . $row['PASSWORD']; 
        mail($email, "Practice Log - Password Recovery", $email_body);
        $response["message"] = "Reminder email has been sent";

    }

    echo json_encode($response);
    mysqli_close($con);

?>