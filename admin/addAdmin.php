<?php
    include('../partial/menu.php');
    require_once 'adminController.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php if(count($errors) > 0):?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
        <?php endif; ?>
        
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="admin_name" placeholder="Enter Your Name" value="<?php echo $admin_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="admin_username" placeholder="Your Username" value="<?php echo $admin_username; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="admin_password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>    
        
        </form>
    </div>
</div>

<?php include('../partial/footer.php'); ?>