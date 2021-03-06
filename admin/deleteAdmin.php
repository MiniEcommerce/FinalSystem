<?php
    require '../config/db.php';

    //GET THE ID OF ADMIN TO BE DELETED
    $id = $_GET['id'];

    //2. SQL QUERY TO DELETE ADMIN.
    $sql = "DELETE FROM table_admin WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    //3. Execute the statement
    if($stmt->execute())
    {
        $_SESSION['delete_success'] = "<div class='success'>Admin Deleted Successfully.</div>";
        header('location: manageAdmin.php');
        exit();
    }