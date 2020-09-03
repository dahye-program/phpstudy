<?php
$con=mysqli_connect("localhost","root","","hedgehogmember");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8");

$res=mysqli_query($con,"select*from attendance_data");
$result = array();

if($result){
    while($row=mysqli_fetch_array($result)){
        array_push($data, array('record=>$row[0]'));
    }
   header('Content-Type: application/json; charset=utf8');
   $json = json_encode(array("record"=>$data),JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
   echo $json;
}
else{
    echo "SQL문 처리중 에러 발생";
}
mysqli_close($con);

?>
