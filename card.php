<?php include('partials/nav.php'); ?>

</div>
</div>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="product2">
        <div class="container">
            <h2 class="text-center2">All Product</h2>

            <?php

                $sql = "SELECT * FROM card WHERE active='Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                            <div class="product-box">
                                <div class="product-img">
                                
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>image/Card/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                        <?php
                                    }
                                    

                                ?>
                                    
                                </div>

                                <div class="product-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="product-price">$<?php echo $price; ?></p>
                                    <p class="product-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order1.php?card_id=<?php echo $id; ?>" class="btn btn-primary" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                   
                }
                else
                {
                    echo "<div class='error'>Product Not Available</div>";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>

    <?php include('partials/footer.php'); ?>