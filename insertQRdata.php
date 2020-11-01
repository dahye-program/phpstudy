<?php
require_once('db_config.php');

$userData=$_POST['userdata'];

$sql="INSERT INTO attendance_data(record) VALUES('$userData')";

if($con->query($sql)==TRUE){
    echo "New record create successfully";
}

mysqli_close($con);

?>
