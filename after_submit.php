<?php
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = test_input($_POST['name']);
    $useremail = test_input($_POST['email']);
    $usermess = test_input($_POST['mess']);
    $errors = array();

    if($username == ""){
        $errors[0] = "I think You 've a name right!!";
        $errors[1] = "";
    }else{
        $errors[0] = "";
        $match_res = preg_match("/^[\x{0600}-\x{06FF}a-zA-Z ]*$/u",$username);
        if ($match_res == true){
            $errors[1] = "";
        }
        else{
            $errors[1] = "Your must contain letters only";
        }
    }

    if($useremail == ""){
        $errors[2] = "No email! no message";
        $errors[3] = "";
    }else{
        $errors[2] = "";
        $validmail = filter_var($useremail,FILTER_VALIDATE_EMAIL);
        if($validmail == true){
            $errors[3] = "";
        }
        else{
            $errors[3] = "Invalid email..";
        }
    }

    if($usermess == ""){
        $errors[4] = "Really! you don't 've a message";
    }else{
        $errors[4] = "";
    }

    if($errors[0] == "" && $errors[1] == "" && $errors[2] == "" && $errors[3] == "" && $errors[4] == ""){
        $con = mysqli_connect("localhost", "root" , "" , "sedia_admin");
        $insert_sql = "INSERT INTO messages (name,email,mess) VALUES ('{$username}','{$useremail}','{$usermess}')";
        $result = mysqli_query($con, $insert_sql);
        echo"valid";
        exit();
    }else{
        echo implode('-', $errors);
        exit();
    }
    exit();

?>