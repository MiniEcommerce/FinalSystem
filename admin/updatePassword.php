<?php include('../partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-30">
            <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" valie="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>    
        
        </form>
    </div>
</div>

<?php include('../partial/footer.php'); ?>

<?php
    //Process the value from Form and Save it in Database
    //check whether the submit button is clicked or not 

    if(isset($_POST['submit']))
    {
        //Button clicked
        // echo "Button Clicked";
    }
    else
    {
        //button not clicked
        // echo "Button Not Clicked  ";
    }
?>

