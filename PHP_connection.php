<?php
$con=mysqli_connect("localhost","root","","test");

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8");

$res=mysqli_query($con,"select*from memberinfo");
$result = array();

while($row=mysqli_fetch_array($res)){
    array_push($result, array('status'=>$row[0], 'name'=>$row[1],'num'=>$row[2]));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

?>

<?php

    error_reporting(E_ALL);
    ini_set('display_errors',1);

    include('dbcon.php');

    $android=strpos($_SERVER['HTTP_USER_AGENT'],"Android");

    if((($_SERVER['REQUEST_METHOD']=='POST')&&isset($_POST['submit']))||$android){
        //안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받는다.
        $name=$_POST['name'];
        $number=$_POST['number'];

        if(empty($name)){
            $errMSG="이름을 입력하세요";
        }
        else if(empty($number)){
            $errMSG="학번을 입력하세요.";
        }
        if(!isset($errMSG)){ //이름과 학번 모두 입력이 되었다면
            try{
                //SQL문을 실행하여 데이터를 MySQL 서버의 memberinfo테이블에 저장
                $stmt=$con->prepare('INSERT INTO memberinfo(name, number) VALUES(:name, :number)');
                $stmt->bindParam(':name',$name);
                $stmt->bindParam(':number',$number);

                if($stmt->execute()){
                    $successMSG="새로운 사용자를 추가했습니다.";
                }
                else{
                    $errMSG="사용자 추가 에러";
                }
            }catch(PDOException $e){
                die("Database error: ".$e->getMessage());
            }
    }
    }
?>

<?php
    if(isset($errMSG)) echo $errMSG;
    if(isset($successMSG)) echo $successMSG;
        $android=strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    if(!$android){
?>
    <html>
        <body>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                Name:<input type="text" name="name" />
                Number: <input type="text" name="number" />
                <input type = "submit" name="submit" />
            </form>
        </body>
    </html>
<?php
    }
?>