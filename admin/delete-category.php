<?php
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        //remove the image file is available
        if($image_name!="")
        {
            //remove the image
            $path="../image/category/".$image_name;
            $remove=unlink($path);

            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'>Failed to remove category image</div>";
                //redirect
                header('location:'.SITEURL.'admin/category.php');
                //stop process
                die();
            }
        }

        //sql query to delete data
        $sql="DELETE FROM category WHERE id=$id";

        //execute
        $res=mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
            //redirect
            header('location:'.SITEURL.'admin/category.php');
        }
        else
        {
            $_SESSION['delete']="<div class='error'>Failed to delete category</div>";
            //redirect
            header('location:'.SITEURL.'admin/category.php');
        }

    }
    else
    {
        header('location:'.SITEURL.'admin/category.php');
    }

?>