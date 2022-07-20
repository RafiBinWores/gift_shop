<?php include('header/header.php'); ?>

<div class="content">
    <div class="warpper">
        <h1>Add Category</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-2">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                <td colspan="2"><input type="submit" name="submit" value="Add Category" class="btn-p"></td>
                </tr>
            </table>

            <?php
                if(isset($_POST['submit']))
                {
                    //get the value from form
                    $title=$_POST['title'];
                    //for radio input type we need to check weather the button selected or not
                    if(isset($_POST['featured']))
                    {
                        $featured=$_POST['featured'];
                    }
                    else
                    {
                        $featured="No";
                    }

                    if(isset($_POST['active']))
                    {
                        $active=$_POST['active'];
                    }
                    else
                    {
                        $active="No";
                    }
                    //image selected or not
                    //print_r($_FILES['image_name']);

                   // die();      //break the code
                   if(isset($_FILES['image']['name']))
                   {
                       //upload image
                        $image_name=$_FILES['image']['name'];

                        if($image_name != "")
                        {

                            //auto rename
                            $ext=end(explode('.', $image_name));

                            //rename image
                            $image_name="Cards_category_".rand(000, 999).'.'.$ext;


                            $source_path=$_FILES['image']['tmp_name'];
                            $destination_path="../image/Category/".$image_name;

                            //upload file
                            $upload=move_uploaded_file($source_path, $destination_path);

                            if($upload==false)
                            {
                                $_SESSION['upload']="<div class='erreo'>Failed to Upload image</div>";
                                header('location:'.SITEURL.'admin/add-category.php');

                                die();
                            }

                        }
                   }
                   else
                   {
                       $image_name="";
                   }

                    //create sql query
                    $sql="INSERT INTO category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    ";

                    //execute query
                    $res=mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $_SESSION['add']="<div class='success'>Category Added Successfully</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/category.php');
                    }
                    else
                    {
                        $_SESSION['add']="<div class='error'>Failed to add category</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/add-category.php');
                    }
                    

                }

            ?>

    </div>

</div>

    