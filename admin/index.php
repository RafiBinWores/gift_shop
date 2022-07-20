<?php include('header/header.php'); ?>

<div class="content">
    <div class="warpper">
        <h1>DashBoard</h1>

        <?php

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
            }

        ?>

    </div>

</div>
    