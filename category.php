<?php include('partials/nav.php'); ?>

</div>
</div>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Category</h2>
            
            <?php

                    $sql = "SELECT * FROM category WHERE active='Yes' ";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {
                        While($row=mysqli_fetch_assoc($res))
                        {
                            $id= $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            ?>  
                            
                                
                            <a href="<?php echo SITEURL; ?>category-card.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                        <?php
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>image not available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>image/Category/<?php echo $image_name; ?>"></a>
                                            <?php
                                        }
                                        ?>

                                    <h3><?php echo $title; ?></h3>
                                    </div>
                                </a>

                            <?php
                        }
                    }
                    else
                    {
                    echo "<div class='error'>Cateygory Not Added</div>";
                    }

                    ?> 


            <div class="clearfix"></div>
        </div>
    </section>

    <?php include('partials/footer.php'); ?>