<?php

session_start();

require 'config/db.php';
require_once 'controllers/emailController.php';

//$errors will be a global variable
$errors = array();

$username = "";
$email = "";

//---------------------------------------------------------------------------------------------------------//
// If SIGN-UP button is clicked
if(isset($_POST['signup-btn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    if(empty($username))
    {
        $errors['username'] = "Username is Required!";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = "E-mail is Invalid!";
    }
    if(empty($email))
    {
        $errors['email'] = "E-mail is Required!";
    }
    if(empty($password))
    {
        $errors['password'] = "Password is Required!";
    }
    if($password !== $confpassword)
    {
        $errors['password'] = "Passwords do not match!";
    }
//---------------------------------------------------------------------------------------------------------//
    $usernameQuery = "SELECT * FROM users WHERE username=? LIMIT 1";

    //PREPARED STATEMENT for the username
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $userDB = $result->num_rows;
    $stmt->close();

    if($userDB > 0 && !empty($username))
    {
        $errors['username'] = "Username already existed!";
    }   
//---------------------------------------------------------------------------------------------------------//
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";

    //PREPARED STATEMENT for the email
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $userDB = $result->num_rows;
    $stmt->close();

    if($userDB > 0 && !empty($email))
    {
        $errors['email'] = "E-mail already existed!";
    }
//---------------------------------------------------------------------------------------------------------//

    //Execute if there's no error
    if(count($errors) === 0)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = 0;

        $sql = "INSERT INTO users (username, email, password, verified, token) VALUES (?, ?, ?, ?, ?)";

        //PREPARED STATEMENT for the insertion of signup values to the database
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssis', $username, $email, $password, $verified, $token);
        
        if($stmt->execute())
        {
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($email, $token);

            header("location: verification.php");
            exit();

        }
        else {
            $errors['db_error'] = "Database error: Failed to Register";
        }
        
    }

}

//---------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------//
// If LOGIN button is clicked
if(isset($_POST['login-btn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username))
    {
        $errors['username'] = "Username is Required!";
    }    
    if(empty($password))
    {
        $errors['password'] = "Password is Required!";
    }

    //Output if there is no error
    if(count($errors) === 0)
    {    
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();    
        $result = $stmt->get_result();

        $user = $result->fetch_assoc();     //Getting all the data from the Database

        if($result->num_rows > 0){
            if(password_verify($password, $user['password']))
            {
                //If login is successful
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];

                header("location: FRONT.php");
                exit();
            }
            else {
                $errors['login_fail'] = "Wrong credentials!";
            }
        }
        else{
            if(empty($username))
            {
                $errors['username'] = "Username is Required!";
            }    
            if(empty($password))
            {
                $errors['password'] = "Password is Required!";
            }
            else {
                $errors['login_fail'] = "Wrong credentials!";
            }
        }
    }
}
//---------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------//

if(isset($_GET['Logout']))
{
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);

    header('location: login.php');
    exit();
}

// Verify user by token
function verifyUser($token){
    global $conn;

    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

        if(mysqli_query($conn, $update_query)){
             //If login is successful
             $_SESSION['id'] = $user['id'];
             $_SESSION['username'] = $user['username'];
             $_SESSION['email'] = $user['email'];
             $_SESSION['verified'] = 1;
 
             header("location: FRONT.php");
             exit();
        }
    }
    else{
        echo "User not Found!";
    }

}
