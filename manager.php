<?php
$con=mysqli_connect("localhost","root","","hedgehogmember");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($con,"utf8"); // db와 데이터를 주고 받을 때 사용할 기본 문자

$managerUserpw=$_POST['userPW'];

$res=mysqli_query($con,"select*from manager");
$result = array();

while($row=mysqli_fetch_array($res)){
    array_push($result, array('password'=>$row[0])); 
    if($managerUserpw==$row[0]){
        echo "1";
    }
}



mysqli_close($con);

?>
