<?php include('partials/nav.php'); ?>

                <div class="row">
                    <div class="col-2">
                        <h1>GIFT SHOP</h1>
                        <p>You know this gift card will deliver excitement as they’ll have the flexibility to get whatever they want. That might be a night out on the town, or a splurge on the groceries. Whatever it is, your gift is sure to meet them with a smile.</p>
                        <a href="#section1" class="button" >Explore Now &#8594;</a>
                    </div>
                    <div class="col-2">
                        <img src="image/card.png">
                    </div>
                </div>
        </div>
    </div>

        <?php

        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }


        ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center"  id="section1">Feature Categories</h2>
                <?php

                    $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3";

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



    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">Feature products</h2>

            <?php
                $sql2 = "SELECT * FROM card WHERE active='Yes' AND featured='Yes' LIMIT 4";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
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
                                    <p class="Product-price">$<?php echo $price; ?></p>
                                    <p class="Product-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order1.php?card_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
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

        <p class="text-center2">
            <a href="<?php echo SITEURL; ?>card.php">See All Products</a>
        </p>
    </section>

    <!-- js for spl_autoload_register -->
    <script>
    var Menu = document.getElementById("Menu");
    Menu.style.maxHeight= "0px";
    function menutoggle(){
        if(Menu.style.maxHeight == "0px")
        {
            Menu.style.maxHeight="200px";
        }
        else
        {
            Menu.style.maxHeight="0px";
        }
    }
</script>
<script>
    $(document).ready(function(){

      $("a").on('click', function(event) {
    
        if (this.hash !== "") {
 
          event.preventDefault();
    
          // Store hash
          var hash = this.hash;

          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

            window.location.hash = hash;
          });
        } 
      });
    });
    </script>

<?php include('partials/footer.php'); ?>
