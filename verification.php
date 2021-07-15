<?php 
  require_once 'controllers/authController.php';

  if(!isset($_SESSION['id']))
  {
    header('location: login.php');
    exit();
  }
  if($_SESSION['verified'] == 1)
  {
    header('location: FRONT.php');
    exit();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <title>Verification</title>
  </head>
  <body class="bodybg">
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">

          <div class="alert alert-primary mt-sm-3">
            Hello, <strong> <?php echo $_SESSION['username']; ?> </strong>
          </div>
          <div class="alert alert-warning mt-sm-3">            
            You are not yet a member.
            Click on the Verification link we just emailed at
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div>
          
        </div>
      </div>
    </div>

    
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>