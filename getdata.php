<?php
require_once('db_config.php');

$res=mysqli_query($con,"select*from hedgehoginfo");
$result = array();

while($row=mysqli_fetch_array($res)){
    array_push($result, array('status'=>$row[0], 'name'=>$row[1],'number'=>$row[2]));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

?>
