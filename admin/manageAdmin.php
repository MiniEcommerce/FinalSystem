<?php include('../partial/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1 style="padding: 3px 0px;">Admin</h1>

                <!-- Button to add Admin -->
                <a href="addAdmin.php" class="btn-primary">Add Admin</a>

                <br />  <br />

                <table class="tbl-full">

                <?php 
                    if(isset($_SESSION['add_success']))
                    {
                        echo $_SESSION['add_success'];
                        unset($_SESSION['add_success']);
                    }
                    if(isset($_SESSION['delete_success']))
                    {
                        echo $_SESSION['delete_success'];
                        unset($_SESSION['delete_success']);
                    }

                ?>
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                         $sql = "SELECT * FROM table_admin";
                         $stmt = $conn->query($sql);                        

                         if($stmt==TRUE)
                         {
                             
                             $count = $stmt->num_rows;

                             $sn = 1;

                             if($count>0)
                             {
                                 while($rows=$stmt->fetch_assoc())
                                 {
                                     $admin_id = $rows['id'];
                                     $admin_name = $rows['admin_name'];
                                     $admin_username = $rows['admin_username'];
                                     ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>.</td>                    
                                        <td><?php echo $admin_name; ?></td>
                                        <td><?php echo $admin_username; ?></td>
                                        <td>
                                            <a href="updatePassword.php" class="btn-primary"> Change Password
                                            <a href="updateAdmin.php" class="btn-secondary"> Update Admin
                                            <a href="deleteAdmin.php?id=<?php echo $admin_id; ?>" class="btn-danger"> Delete Admin
                                        </td>
                                     </tr>
                                     <?php
                                 }
                             }
                        } 
                        ?>                   
                    
                    
                </table>

            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('../partial/footer.php'); ?>