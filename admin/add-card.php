<?php include('header/header.php'); ?>

<div class="content">
    <div class="warpper">
        <h1>Add Gift Card</h1>
        <br><br>
        <?php

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']); 
            } 

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-2">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Gift Card Title">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="20" rows="5"placeholder="Gift Card Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php

                                //to display category from db
                                //sql query
                                $sql = "SELECT * FROM category WHERE active='YES' ";

                                //execute
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    
                                        <option value="0">No Category Found</option>

                                    <?php
                                }
                            ?>

                        </select>
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
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Card" class="btn-p">
                    </td>
                </tr>

            </table>
        </form>

        <?php

            if(isset($_POST['submit']))
            {
                //add card in database
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //upload image if selected
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        //rename the image
                        $ext = end(explode('.', $image_name));

                        //create new name for image
                        $image_name = "Card-Name-".rand(0000,9999).".".$ext;

                        //source path is the current location of the image
                        $src=$_FILES['image']['tmp_name'];

                        //destination path for the image
                        $dst="../image/Card/".$image_name;

                        //upload card image
                        $upload=move_uploaded_file($src, $dst);

                        //check whether image uploaded or not
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failrd to Upload Image</div>";
                            header('location:'.SITEURL.'admin/add-card.php');
                            die();
                        }
                    }
                }
                else
                {
                    //setting default value as blank
                    $image_name = "";
                }


                    //sql query
                    $sql1 = "INSERT INTO card SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active' ";

                    //execute query
                    $res1 = mysqli_query($conn, $sql1);

                    if($res1==TRUE)
                    {
                        $_SESSION['add-card'] = "<div class='success'>Card Added Successfully</div>";
                        header('location:'.SITEURL.'admin/card.php');
                    }
                    else
                    {
                        $_SESSION['add-card'] = "<div class='error'>Failed to add card</div>";
                        header('location:'.SITEURL.'admin/card.php');
                    }

            }
        ?>

    </div>
</div>