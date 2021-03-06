<?php include('../partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>Final Fantasy VII: Remake</td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        7,000
                    </td>
                </tr>

                <tr>
                    <td>Quantity: </td>
                    <td>
                        <input type="number" name="quantity" placeholder="Game Quantity">
                    </td>
                </tr>

                <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" placeholder="Email"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>

            </table>    
        
        </form>
    </div>
</div>

<?php include('../partial/footer.php'); ?>