<?php
$con=mysqli_connect("localhost","root","","hedgehogmember");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8"); // db와 데이터를 주고 받을 때 사용할 기본 문자

$userpw=$_POST['pw'];

$res=mysqli_query($con,"select*from manager");
$result = array();

    
if($res==$userpw){
    echo "1";
}

mysqli_close($con);

?>
