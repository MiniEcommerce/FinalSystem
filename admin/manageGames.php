<?php include('../partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Games</h1>

        <br /><br />

<!-- Button to add Admin -->
<a href="addGames" class="btn-primary">Add Games</a>

<br />  <br />

<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Game Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Status</th>
        <th>Actions</th>
    <tr>   
        
    <tr>
        <td>1.</td>
    
        <td>Call of Duty: Modern Warfare</td>
        <td>3,000</td>
        <td>No Image</td>
        <td>-</td>

        <td>
            <a href="updateGames.php" class="btn-secondary"> Update Game
            <a href="#" class="btn-danger"> Delete Game
        </td>
    </tr>

    <tr>
        <td>2.</td>
    
        <td>Final Fantasy VII: Remake</td>
        <td>7,000</td>
        <td>No Image</td>
        <td>-</td>
        <td>
            <a href="updateGames.php" class="btn-secondary"> Update Game
            <a href="#" class="btn-danger"> Delete Game
        </td>
    </tr>

    <tr>
        <td>3.</td>
    
        <td>Tekken 7</td>
        <td>3,000</td>
        <td>No Image</td>
        <td>-</td>
        <td>
            <a href="updateGames.php" class="btn-secondary"> Update Game
            <a href="#" class="btn-danger"> Delete Game
        </td>
    </tr>

</table>
    </div>
    
</div>

<?php include('../partial/footer.php'); ?>
