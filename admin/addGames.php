<?php include('../partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Game</h1>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="game_title" placeholder="Game Title"></td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Game."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" placeholder="Game Price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
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
        echo "Button Clicked";
    }
    else
    {
        //button not clicked
        echo "Button Not Clicked  ";
    }
?>