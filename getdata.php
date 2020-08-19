<?php
$con=mysqli_connect("localhost","root","","hedgehogmember");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8");

$res=mysqli_query($con,"select*from hedgehoginfo");
$result = array();

while($row=mysqli_fetch_array($res)){
    array_push($result, array('name'=>$row[0],'num'=>$row[1]));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

?>
