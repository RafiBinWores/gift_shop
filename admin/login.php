<?php include('../config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gift Shop</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
<body>
<img class="wave" src="../image/wave.png">
	<div class="container">
		<div class="img">
			<img src="../image/bg.svg">
		</div>
		<div class="login-content">
          
			<form action="" method="POST">
				<img src="../image/avatar.svg">
				<h2 class="title">Welcome</h2>
                
                <div class="l-m">
                <?php

                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }

                if(isset($_SESSION['login-check']))
                {
                    echo $_SESSION['login-check'];
                    unset($_SESSION['login-check']);
                }

                ?>
                </div>
                <!-- <i class="fas fa-user"> -->
           		<input type="text" class="input-field" name="username" placeholder="Username">
    	
                <!-- <i class="fas fa-lock"> -->
           		<input type="password" class="input-field" name="password" placeholder="Password">
            	
            	<input type="submit" name="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        //process for  login
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $sql= "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        
        //excute query
        $res=mysqli_query($conn, $sql);

        $count=mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login']="<div class='success'>Login Successful</div>";
            $_SESSION['user']=$username;
            //redirect
            header('location:' .SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login']="<div class='error'>Username or Password Did not Match</div>";
            //redirect
            header('location:' .SITEURL.'admin/login.php');
        }
    }

?>
