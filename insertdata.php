<?php
require_once('db_config.php');

$userStatus=$_POST['status'];
$userName=$_POST['name'];
$userNumber=$_POST['number'];


$sql="INSERT INTO hedgehoginfo(status, name, number)VALUES('$userStatus','$userName','$userNumber')";

if($con->query($sql)==TRUE){
    echo "New record create successfully";
}else{
    echo "Error: ".$sql."".$con->error;
}

mysqli_close($con);

?>
