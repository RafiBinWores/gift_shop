<?php include('header/header.php'); ?>

<div class="content">
    <div class="warpper">
        <h1>Edit Category</h1>
        <br><br>

        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            //create sql query
            $sql = "SELECT * FROM category WHERE id=$id";

            //execute query
            $res=mysqli_query($conn, $sql);

            //count the rows
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }
            else
            {
                //redirect
                $_SESSION['category-not-found'] = "<div class='error'>Category not found</div>";
                header('location:'.SITEURL.'admin/category.php');
            }

        }
        else
        {
            //redirect to category page
            header('location:'.SITEURL.'admin/category.php');
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-2">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                            <?php
                               if($current_image != "")
                               {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>image/Category/<?php echo $current_image; ?>" width="70px" >
                                    <?php
                               }
                               else
                               {
                                   echo "<div class='error'>Image not added</div>";
                               }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes

                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Save Changes" class="btn-p">
                    </td>
                </tr>
                

            </table>
        </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                        //get all values
                        $id = $_POST['id'];
                        $title = $_POST['title'];
                        $current_image = $_POST['current_image'];
                        $featured = $_POST['featured'];
                        $active = $_POST['active'];

                        //updating image.. button clicked or not
                        if(isset($_FILES['image']['name']))
                        {
                            $image_name = $_FILES['image']['name'];

                            if($image_name !="")
                            {
                                //update new image

                                //auto rename
                                $ext = end(explode('.', $image_name));

                                //rename image
                                $image_name = "Cards_category_".rand(0000, 9999).'.'.$ext;


                                $source_path=$_FILES['image']['tmp_name'];
                                $destination_path="../image/Category/".$image_name;

                                //upload file
                                $upload = move_uploaded_file($source_path, $destination_path);

                                if($upload==false)
                                {
                                    $_SESSION['upload']="<div class='erreo'>Failed to Upload image</div>";
                                    header('location:'.SITEURL.'admin/category.php');

                                    die();
                                }

                                //remove current image
                                if($current_image!= "")
                                {
                                    $remove_path = "../image/Category/".$current_image;
                                    $remove = unlink($remove_path);
                                
                                   if($remove==false)
                                    {
                                        $_SESSION['failed'] = "<div class='error'>Failed to remove current image</div>";
                                        header('location:'.SITEURL.'admin/category.php');
                                        die();
                                    }
                                }

                            }
                            else
                            {
                                $image_name = $current_image;
                            }
                        }
                        else
                        {
                            $image_name = $current_image;
                        }

                        //update database
                        $sql2 = "UPDATE category SET
                        title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active'
                        WHERE id=$id ";

                        //execute
                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==TRUE)
                        {
                            $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
                            header('location:'.SITEURL.'admin/category.php');
                        }
                        else
                        {
                            $_SESSION['update'] = "<div class='error'>Failed to update category</div>";
                            header('location:'.SITEURL.'admin/category.php');
                        }
                    }
                ?>
    </div>
</div>