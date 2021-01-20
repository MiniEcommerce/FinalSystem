<?php

session_start();

require 'config/db.php';

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

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";

    //PREPARED STATEMENT for the email
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $usercount = $result->num_rows;
    $stmt->close();

    if($usercount > 0)
    {
        $errors['email'] = "E-mail already existed!";
    }
    //Checking the Sign up form if how many errors
    if(count($errors) === 0)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

        //PREPARED STATEMENT for the insertion of signup values to the database
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $password, $email);
        
        if($stmt->execute())
        {
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            header("location: index.php");
            exit();

        }else {
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

    //Check if there is an error
    if(count($errors) === 0)
    {    
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();    
        $result = $stmt->get_result();

        $user = $result->fetch_assoc();     //Getting all the data from the Database

        if(password_verify($password, $user['password']))
        {
            //If login is successful
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            header("location: index.php");
            exit();

        }else {
            $errors['login_fail'] = "Wrong credentials!";
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
    header('location: login.php');
    exit();
}
