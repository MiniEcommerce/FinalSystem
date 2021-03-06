<?php

session_start();

require '../config/db.php';

//$errors will be a global variable
$errors = array();

$admin_username = "";
$admin_name = "";
    //Process the value from Form and Save it in Database
    //check whether the submit button is clicked or not 

if(isset($_POST['submit']))
{
    $admin_name = $_POST['admin_name'];
    $admin_username = $_POST['admin_username'];
    $admin_pass = $_POST['admin_password'];

    if(empty($admin_name))
    {
        $errors['admin_fullname'] = "Admin Name is Required!";
    }
    if(empty($admin_username))
    {
        $errors['username'] = "Username is Required!";
    }
    if(empty($admin_pass))
    {
        $errors['password'] = "Password is Required!";
    }

    $adminQuery = "SELECT * FROM table_admin WHERE admin_username = ? LIMIT 1";

    $stmt = $conn->prepare($adminQuery);
    $stmt->bind_param('s', $admin_username);
    $stmt->execute();

    $result = $stmt->get_result();
    $adminDB = $result->fetch_assoc();
    $stmt->close();

    if($adminDB['admin_username'] == $admin_username && !empty($admin_username))
    {
        $errors['admin_username'] = "Username is already existed!";
    }
//---------------------------------------------------------------------------------------------------------//

    //Execute Register/Add Admin if there's no error
    if(count($errors) === 0)
    {
        $admin_pass = password_hash($admin_pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO table_admin (admin_name, admin_username, admin_password) VALUES (?,?,?)";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param('sss', $admin_name, $admin_username,$admin_pass);

        if($stmt->execute())
        {
            $admin_id = $conn->insert_id;    //DECLARING NEW VARIABLE GETTING THE ID IN DATABASE
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_username'] = $admin_username;
            
            
            $_SESSION['add_success'] = "<div class='success'>Admin Added Successfully.</div>";

            header("location: manageAdmin.php");
            exit();

        }
        else {
            $errors['db_error'] = "Database error: Failed to Register";
        }
    
    }

}
//-------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------//
//LOGIN//
if(isset($_POST['admin-btn']))
{
    $admin_username = $_POST['admin_username'];
    $admin_pass = $_POST['admin_pass'];
    

    if(empty($admin_username))
    {
        $errors['admin_user'] = "Username is Required!";
    }
        
    if(empty($admin_pass))
    {
        $errors['admin_pass'] = "Password is Required!";
    }
    //Output if there is no error
    if(count($errors) === 0)
    {    
        
        $sql = "SELECT * FROM table_admin WHERE admin_username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $admin_username);
        $stmt->execute();
        $result = $stmt->get_result();

        $admin = $result->fetch_assoc();     //Getting all the data from the Database

        if(password_verify($admin_pass, $admin['admin_password']) && $admin_username === $admin['admin_username'])
        {
            //If login is successful
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['admin_name'];
            $_SESSION['admin_username'] = $admin['admin_username'];

            header("location: project.php");
            exit();

        }else {
            $errors['login_fail'] = "Wrong credentials!";
        }
    }
}

//-------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------//

if(isset($_GET['adminLogout']))
{
    session_destroy();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_username']);

    header('location: adminLogin.php');
    exit();
}

