<?php
    error_reporting(E_ALL);
    ini_set('display errors',1);

    include('db_config.php');

    $stmt = $con->prepare('select * from memberinfo');
    $stmt->execute();

    if($stmt->rowCount()>0){
        $data=arrray();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            array_push($data, array('id'=>$id, 'name'=>$name, 'number'=>$number));
        }
        header('Content-Type: application/json; charset=utf8');
        $json=json_encode(array("webnautes"=>$data),JSON_PRETTY_PRINT_JSON_UNESCAPED_UNICODE);
        echo $json;
    }
?>