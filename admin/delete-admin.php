<?php

    include('../config/constants.php');

    //get the id of admin to be deleted
    $id = $_GET['id'];


    //create sql query
    $sql= "DELETE FROM admin WHERE id=$id";

    //excute query
    $res=mysqli_query($conn, $sql);

    //check whether the query executed or not
    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        //redirect page
        header('location:' .SITEURL.'admin/admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed To Delete Admin</div>";
        //redirect page
        header('location:' .SITEURL.'admin/admin.php');
    }


?>