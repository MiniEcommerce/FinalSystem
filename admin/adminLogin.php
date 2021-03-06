<?php require_once 'adminController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">

    <title>Admin Log-in</title>
</head>
<body class="bodybg">

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
            <form action="adminLogin.php" method="post">
                <h3 class="text-center">Admin Login</h3>

                <?php if(count($errors) > 0):?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="username">Admin Username</label>
                    <input type="text" name="admin_username" value="<?php echo $admin_username; ?>" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="admin_pass" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <button type="submit" name="admin-btn" class="btn btn-primary btn-lg btn-block">Login</button>
                </div>

            </form>        
        </div>
    </div>
</div>
    
</body>
</html>