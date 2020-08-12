<?php
$con=mysqli_connect("localhost","root","","test");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8");

$userStatus=$_POST['id'];
$userName=$_POST['name'];
$userNumber=$_POST['number'];


$sql="INSERT INTO memberinfo(id, name, number)VALUES('$userStatus','$userName','$userNumber')";

if($con->query($sql)==TRUE){
    echo "New record create successfully";
}else{
    echo "Error: ".$sql."".$con->error;
}

mysqli_close($con);

?>
