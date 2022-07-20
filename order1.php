<?php include('partials/nav.php'); ?>

<?php
    if(isset($_GET['card_id']))
    {
        $card_id = $_GET['card_id'];

        //get the details
        $sql="SELECT * FROM card WHERE id=$card_id";

        //executr
        $res=mysqli_query($conn, $sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);

            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);
    }
?>

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center2 text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Product</legend>

                    <div class="product-img">
                        <?php

                            if($image_name=="")
                            {
                                echo "<div class='error'>image not availabe</div>";
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
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="card" value="<?php echo $title; ?>">


                        <p class="card-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="8" placeholder="" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

            if(isset($_POST['submit']))
            {
                $card = $_POST['card'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;

                $order_date = date("y-m-d h:i:sa");

                $status = "Ordered";

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                $sql1 = "INSERT INTO order SET 
                card ='$card',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status'
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                ";

                //echo $sql1; die();

                $res1 = mysqli_query($conn, $sql1);
                if($res1==true)
                    {
                            $_SESSION['order'] = "<div class='success'>Product order successful</div>";
                            header('location:'.SITEURL);
                    }
                    else 
                    {
                            $_SESSION['order'] = "<div class='error'>Product order Failed</div>";
                            header('location:'.SITEURL);
                    }
            }

?>

        </div>
    </section>

    <!-- <?php include('partials/footer.php'); ?>  -->

    