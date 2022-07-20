<?php include('header/header.php'); ?>

<!-- Main content -->

<div class="content">
    <div class="warpper">
        <h1>Manage Gift Card</h1>
        <br>           
        <br>

        <?php

            if(isset($_SESSION['add-card'] ))
            {
                echo $_SESSION['add-card'];
                unset($_SESSION['add-card']); 
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['f-to-remove']))
            {
                echo $_SESSION['f-to-remove'];
                unset($_SESSION['f-to-remove']);
            }

            if(isset($_SESSION['f-to-upload']))
            {
                echo $_SESSION['f-to-upload'];
                unset($_SESSION['f-to-upload']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

        ?>



        <!-- button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-card.php" class="btn-p">Add Card</a>


        <table class="table">
            <tr>
            <thead>
                <th>Serial No</th>
                <th>Title</th>
                <!-- <th>Description</th> -->
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </thead>
            </tr>
            <?php
                //sql Query
                $sql = "SELECT * FROM card";

                //execute
                $res=mysqli_query($conn, $sql);

                //check to u have card or not
                $count=mysqli_num_rows($res);

                //create serial number
                $sn=1;
                
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title= $row['title'];
                        // $description = $row['description'];
                        $price = $row['price'];
                        $image_name= $row['image_name'];
                        $featured= $row['featured'];
                        $active= $row['active'];

                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <!-- <td><?php echo $description; ?></td> -->
                                <td>$<?php echo $price; ?></td>
                                <td>
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image Not Added</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>image/Card/<?php echo $image_name; ?>" width="70px" >
                                            <?php
                                        }

                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/edit-card.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-s">Edit</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-card.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-t">Delete</a>
                                </td>
                            </tr>
                        <?php
                    }
                }
                else
                {
                    echo "<tr>
                            <td colspan='7' class='error'>Card Not Added</td>
                         </tr>";
                }
            ?>
        </table>
    </div>
</div>