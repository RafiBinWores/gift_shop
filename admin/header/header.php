<?php 

    include('../config/constants.php');
    include('login-check.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gift Shop</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
    <body>

        <div class="header">
                <div class="navbar">
                    <div class="logo">
                        <h1>Gift Shop</h1>
                        
                    </div>
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</li></a>
                            <li><a href="admin.php">Admin</a></li>
                            <li><a href="category.php">Category</li></a>
                            <li><a href="card.php">Card</li></a>
                            <li><a href="order.php">Order</li></a>
                            <li><a href="logout.php" ><i class="fas fa-sign-out-alt"></i></li></a>

                        </ul>
                    </nav>
                        
                </div>
        </div>
    </body>
</html>