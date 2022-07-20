<?php

    //checking user log in or not
    if(!isset($_SESSION['user'])) //if user session is not set
    {
        $_SESSION['login-check']="<div class='error'>Login To access admin panel</div>";
        header('location:'.SITEURL.'admin/login.php');
    }

?>