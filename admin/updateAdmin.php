<?php include('../partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Full Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
        // echo "Button Not Clicked";
    }
?>