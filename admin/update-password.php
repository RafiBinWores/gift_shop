<?php include('header/header.php'); ?>

<div class="content">
    <div class="warpper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }

        ?>


        <form action="" method="POST">
            <table class="table-2">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-p">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php

    //check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
    }
    //checking current id or password exists or not
    $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

    //excute
    $res=mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            //check whether new pass and confirm pss match or not
            if($new_password==$confirm_password)
            {
                // update passs
                $sql2="UPDATE admin SET
                password='$new_password'
                WHERE id=$id";

                //excute the query
                $res2=mysqli_query($conn, $sql2);
                
                //check whether query excuted or not
                if($res2==TRUE)
                {
                    //display success message
                    $_SESSION['change-password']="<div class='success'> Password Changed</div>";
                    header('location:'.SITEURL.'admin/admin.php');
                }
                else
                {
                    //error message
                    $_SESSION['change-password']="<div class='error'> Failed To Change Password</div>";
                    header('location:'.SITEURL.'admin/admin.php');
                }
            }
            else
            {
                $_SESSION['password-not-match']="<div class='error'> Password Not Match</div>";
                header('location:'.SITEURL.'admin/admin.php');
            }
        }
        else
        {
            $_SESSION['user-not-found']="<div class='error'> User Not Found</div>";
            header('location:'.SITEURL.'admin/admin.php');
        }
    }

?>