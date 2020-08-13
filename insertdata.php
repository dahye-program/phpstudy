<?php
$con=mysqli_connect("localhost","root","","hedgehogmember");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8"); // db와 데이터를 주고 받을 때 사용할 기본 문자

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
