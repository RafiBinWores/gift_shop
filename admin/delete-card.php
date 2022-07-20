<?php

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name!="")
        {
            $path = "../image/Card/".$image_name;
            $remove = unlink($path);

            //checking image is removed  or not
            if($remove==false)
            {
                $_SESSION['f-to-remove'] = "<div class='error'>Failed to remove image</div>";
                //redirect
                header('location:'.SITEURL.'admin/card.php');
                die();
            }
        }

        $sql = "DELETE FROM card WHERE id=$id";

        //execute
        $res = mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $_SESSION['delete'] = "<div class='success'>Gift Card Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/card.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Gift Card</div>";
            header('location:'.SITEURL.'admin/card.php');
        }
    }
    else
    {
        //redirect
        $_SESSION['delete'] = "</div class='error'>Failed to delete</div>";
        header('location:'.SITEURL.'admin/card.php');
    }
?>