<?php require_once 'controllers/authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- BOOTSTRAP CSS DOLZ-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Sign-up</title>
</head>
<body class="bodybg">

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div">
            <form action="signup.php" method="post">
                <h3 class="text-center">Sign-up</h3>

                <?php if(count($errors) > 0):?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="confpassword">Confirm password</label>
                    <input type="password" name="confpassword" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <button type="submit" name="signup-btn" class="btn btn-primary btn-lg btn-block">Sign-up</button>
                </div>

                <p class="text-center">Already have an Account? <a href="login.php">Sign-in</a></p>

            </form>        
        </div>
    </div>
</div>
    
</body>
</html>