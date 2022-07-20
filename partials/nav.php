<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gift Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f008b79490.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

    <div class="header">
    <div class="navbar">
        <div class="container1">
            <nav>
            <div class="logo"> Gift Shop</div>
 
            <div class="nav-item">
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>category.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>card.php">Product</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact-us.php">Contact Us</a>
                    </li>

            </div>
            <form action="<?php echo SITEURL; ?>card-search.php" method="POST">
                <input  type="search" name="search" class="search" placeholder="Search.." required >
                <button type="submit" name="submit" class="fas fa-search"></button>
            </form>
            </nav>

            <div class="clearfix"></div>
        </div>
</div>
       
</body>
</html>
