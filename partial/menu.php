<?php
require_once 'adminController.php';

if(!isset($_SESSION['admin_id']))
{
    header('location: adminLogin.php');
    exit();
}

?>

<html>
    <head>
        <title>Game Kiosk Website - Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu">
            <div class="wrapper">
                <ul>
                    <li><a href="project.php">Home</a></li>
                    <li><a href="manageAdmin.php">Admin</a></li>
                    <li><a href="manageGames.php">Games</a></li>
                    <li><a href="manageOrder.php">Order</a></li>
                    <li><a href="project.php?adminLogout=1">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->