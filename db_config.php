<?php
    $con=mysqli_connect("localhost","root","","hedgehogmember");

    if(mysqli_connect_errno($con)){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_set_charset($con,"utf8");
?>