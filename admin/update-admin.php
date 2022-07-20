<?php include('header/header.php'); ?>

    <div class="content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br><br>
            <?php
                //get the id of selected admin
                $id=$_GET['id'];
                //sql query
                $sql="SELECT * FROM admin WHERE id=$id";
                //execute
               $res=mysqli_query($conn, $sql);
                // check
                if($res==TRUE)
                {
                    $count=mysqli_num_rows($res);
                    if($count==1)
                    {
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    }
                    else
                    {
                        header('location:' .SITEURL. 'admin/manage-admin.php');
                    }
                 
                }

            ?>

            <form action="" method="post">
                <table class="table-2">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Save Changes" class="btn-p">
                        </td>
                    </tr>

                </table>

            </form>    
        </div>
    </div>

<?php

            if(isset($_POST['submit']))
            {
                //update values
                $id = $_POST['id'];
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];

                //sql query
                $sql="UPDATE admin SET 
                full_name='$full_name',
                username= '$username'
                WHERE id = '$id'
                ";

                    //execute the query
                $res = mysqli_query($conn, $sql);

                if($res==TRUE)
                {
                    $_SESSION['update'] = "<div class='success'>Admin Updated Sucessfully</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/admin.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>failed to update Admin</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/admin.php');
                }
                
            }

?>