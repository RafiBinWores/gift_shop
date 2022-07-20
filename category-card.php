<?php 
    include('partials/nav.php'); 

    //check wether id passed or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];

        $sql = "SELECT title FROM category WHERE id=$category_id";

        $res=mysqli_query($conn, $sql);

        $row=mysqli_fetch_assoc($res);

        $category_title = $row['title'];
    }
    else
    {
        header('location:'.SITEURL);
    }
?>

    <section class="food-search text-center2">
        <div class="container">
            
            <h2>Products on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    </div>
</div>


    <section class="product">
        <div class="container">
            <h2 class="text-center2">Product</h2>

            <?php
                    $sql1 = "SELECT * FROM card WHERE category_id=$category_id";

                    $res1 = mysqli_query($conn, $sql1);
    
                    $count1 = mysqli_num_rows($res1);
    
                    if($count1>0)
                    {
                        while($row1=mysqli_fetch_assoc($res1))
                        {
                            $id = $row1['id'];
                            $title = $row1['title'];
                            $price = $row1['price'];
                            $description = $row1['description'];
                            $image_name = $row1['image_name'];
    
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
                                        <a href="<?php echo SITEURL; ?>order.php?card_id=<?php echo $id; ?>" class="btn btn-primary" class="btn btn-primary">Order Now</a>
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