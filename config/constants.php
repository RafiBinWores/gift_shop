<?php

    //start session
    session_start();

    //create constants to store non repeation values
    define('SITEURL', 'https://localhost/gift-shop/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'gift-shop');

    // execute query and save in databases
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());



?>