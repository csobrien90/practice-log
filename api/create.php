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

    verify_users_table($con, DB_DATABASE);
    
    //get user input from form and set as variables

    $json = file_get_contents('php://input');
    $data = json_decode($json);
    
    $name = $data->name;
    $email = $data->email;
    $username = $data->username;
    $password = $data->password;
    
    //security measures on input

    $name = mysqli_real_escape_string($con, htmlspecialchars($name, ENT_QUOTES));
    $email = mysqli_real_escape_string($con, htmlspecialchars($email, ENT_QUOTES));
    $username = mysqli_real_escape_string($con, htmlspecialchars($username, ENT_QUOTES));
    $password = mysqli_real_escape_string($con, htmlspecialchars($password, ENT_QUOTES));

    //query database

    $sql_email = "SELECT * FROM USERS WHERE EMAIL='$email'";
    $result_email = mysqli_query($con, $sql_email);

    $sql_username = "SELECT * FROM USERS WHERE USERNAME='$username'";
    $result_username = mysqli_query($con, $sql_username);

    
    //send back response in response array

    if (mysqli_num_rows($result_email) != 0) {    //if email already exists -> prompt forgot password page

        $response["message"] = "Email is already registered. <a href='retrieve_password.php'>Forgot your password?</a>";

    } else if (mysqli_num_rows($result_username) != 0) {  //else, if username exists -> prompt for new username

        $response["message"] = "Username is taken.";

    } else {    //else, add new user to database -> success message
        
        $sql_add = "INSERT INTO USERS (NAME, EMAIL, USERNAME, PASSWORD) VALUES ('$name','$email','$username','$password');";
        $result = mysqli_query($con, $sql_add);
        
        if ($result) {
            $response["message"] = "User succesfully created";
        } else {
            $response["message"] = "User creation failed";
        }
    }

    echo json_encode($response);
    mysqli_close($con);

    //functions to verify and build table 

    function verify_users_table($connection, $dbName) {
        if(!table_exists("USERS", $connection, $dbName)) {
            $query = "CREATE TABLE USERS (
                ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                USERNAME VARCHAR(45),
                NAME VARCHAR(20),
                EMAIL VARCHAR(45),
                PASSWORD VARCHAR(90)
            )";
      
            if(!mysqli_query($connection, $query)) {
                $response["message"]= 'Error creating table.';
                echo json_encode($response);
                mysqli_close($connection);
                die();
            }
        }
    }

    function table_exists($tableName, $connection, $dbName) {
        $t = mysqli_real_escape_string($connection, $tableName);
        $d = mysqli_real_escape_string($connection, $dbName);
      
        $checktable = mysqli_query($connection,
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");
      
        if(mysqli_num_rows($checktable) > 0) return true;
      
        return false;
      }
    
?>