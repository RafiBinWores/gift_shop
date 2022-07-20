<?php include('header/header.php'); ?>

<!-- Main content -->

<div class="content">
    <div class="warpper">
        <h1>Manage Admin</h1>
        <br>


        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

            // if(isset($_SESSION['user-not-found']))
            // {
            //     echo $_SESSION['user-not-found'];
            //     unset ($_SESSION['user-not-found']);
            // }

            // if(isset($_SESSION['password-not-match']))
            // {
            //     echo $_SESSION['password-not-match'];
            //     unset ($_SESSION['password-not-match']);
            // }

            // if(isset($_SESSION['change-password']))
            // {
            //     echo $_SESSION['change-password'];
            //     unset ($_SESSION['change-password']);
            // }


        ?>
        <br>


        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-p">Add Admin</a>


        <table class="table">
            <thead>
            <tr>
                <th>Serial No</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
            </thead>
                <?php
                    $sql = "SELECT * FROM admin";
                    //EXCUTE QUERY
                    $res= mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        //count rows
                        $count= mysqli_num_rows($res);//function to get all the rows
                        $sn=1;//create a variable and assign the values

                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using loop to get all the data from database
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //displaying the values in table
                                ?>
                                     </tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <!-- <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-change">Change Password</a> -->
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-s">Update Admin</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-t">Delete Admin</a>
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

</html>