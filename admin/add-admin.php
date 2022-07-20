<?php include('header/header.php'); ?>


<br><br>
    <div class="content">
        <div class="warpper">
            <h1>Add Admin</h1>
            <br>


        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

        ?>
        <br>
<br>

    <form actions="" method="POST">
            <table class="table-2">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" name="username" placeholder="Your UserName"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Your Password">
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-p"></td>
                </table>
        </div>
    </div>


    <?php

    if(isset($_POST['submit']))
    {
        // get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // sql query to save the data into database

        $sql= "INSERT INTO admin SET   
        full_name='$full_name',
        username='$username',
        password='$password' 
        ";


         // execute query and save in databases
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            //redirect page TO MANAGE ADMIN
            header("location:".SITEURL.'admin/admin.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed To Add Admin<div>";
            //redirect page TO MANAGE ADMIN
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }

    ?>