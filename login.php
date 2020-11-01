<?php
require_once('db_config.php');

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
