<?php include('../partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Orders</h1>

        <br /><br />

<!-- Button to add Admin -->
<br />  <br />

<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Customer</th>
        <th>Email</th>
        <th>Actions</th>
    <tr>   
        
    <tr>
        <td>1.</td>
    
        <td>Final Fantasy VII: Remake</td> 
        <td>7,000</td>
        <td class="text-center">2</td>
        <td>14,000</td>
        <td>Lucas Graham</td>
        <td>lucas123@gmail.com</td>

        <td>
            <a href="updateOrder.php" class="btn-secondary"> Update Order
            <a href="#" class="btn-danger"> Delete Order
        </td>
    </tr>

    <tr>
        <td>2.</td>
    
        <td>Call of Duty: Modern Warfare</td>
        <td>3,000</td>
        <td class="text-center">1</td>
        <td>3,000</td>
        <td>Victor Neri</td>
        <td>neri@yahoo.com</td>
        <td>
            <a href="updateOrder.php" class="btn-secondary"> Update Order
            <a href="#" class="btn-danger"> Delete Order
        </td>
    </tr>

</table>
    </div>
    
</div>

<?php include('../partial/footer.php'); ?>
