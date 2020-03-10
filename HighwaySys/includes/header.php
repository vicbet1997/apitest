<?php
    require_once "php/getRecords.php";
    $get = new getRecords();
?>
<?php
    require_once "php/getRecords.php";
    $get = new getRecords();
    $ans = $get->getType();
?>
<header>
        <div>
            <p>Animals</p>
            <ul id='links' class='hideMenu'>
<?php

    if($ans == "ADMIN" || $ans == "SUPER_ADMIN"){
?>
                <li><a href="index.php">Index Page</a></li>
                <li><a href="AdminMembers.php">Members</a></li>
                <li><a href="AdminView.php">Pending</a></li>
                <li><a href="AdminInterested.php">Buyers</a></li>
                <li><a href="AdminPost.php">Post</a></li>
                <li><form action="php/handler.php" method='post'><input type='submit' name='logout' value='Log Out'></form></li>
<?php
    }else{
?>
                <li><a href="sell.php">Sell Livestock</a></li>
                <li><a href="index.php">Buy Livestock</a></li>
                <li><a href='doctor.php'>Contact Doctor</a></li>
                <?php
                    if($get->checkLoggedIn()){
                        echo "<li><form action='php/handler.php' method='post'><input type='submit' name='logout' value='Log Out'></form></li>";
                    }else{
                        echo "<li><a href='login.php'>Log In</a></li>
                        <li><a href='register.php'>Register</a></li>";
                    }
                ?>

<?php
     }
?>
                </ul>
            <menu id='menu'><span></span><span></span><span></span></menu>
        </div>
</header>