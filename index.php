<?php 

require_once 'controllers/authController.php'; 

if(!isset($_SESSION['id']))
{
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Home</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div">

            <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

            <a class = "logout" href="index.php?Logout=1">Logout</a>
                  
        </div>
    </div>
</div>
    
</body>
</html>