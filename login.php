<?php
$con=mysqli_connect("localhost","root","","hedgehogmember");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8"); // db와 데이터를 주고 받을 때 사용할 기본 문자

$userStatus=$_POST['status'];
$userName=$_POST['name'];
$userNumber=$_POST['number'];

$res=mysqli_query($con,"select*from hedgehoginfo");
$result = array();

while($row=mysqli_fetch_array($res)){
    array_push($result, array('status'=>$row[0], 'name'=>$row[1],'number'=>$row[2])); 
    if($userStatus==$row[0]){
        if($userName==$row[1]){
            if($userNumber==$row[2]){
                echo "1";
                break;
            }
        }
    }
}

mysqli_close($con);

?>
