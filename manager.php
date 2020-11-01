<?php
require_once('db_config.php');

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
