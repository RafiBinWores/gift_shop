<?php
    include('../config/constants.php');


    //destroy the session
    session_destroy();

    //redirecting
    header('location:'.SITEURL.'admin/login.php');
?>