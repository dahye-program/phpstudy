<?php

    //POST로 보낸 id값을 받아서 변수에 입력
    $id=$_POST['id'];

    //DB접속 스크립트 불러옴
    require_once('db_config.php');

    //받아온 id를 검색 조건으로 특정 멤버의 정보를 불러오는 쿼리문 작성
    $sql="SELECT * FROM employee WHERE id=$id";

    //쿼리문 실행, 결과를 r변수에 저장
    $r=mysqli_query($con, $sql);

    //r변수의 내용을 array형식으로 내보내 result 변수에 저장
    $result=array();
    $row=mysqli_fetch_array($r);
    array_push($reqest,array(
            "id"=>$row['id'],
            "name"=>$row['name'];
            "desg"=>$row['designation'];
            "salary"=>$row['salary'];
    ));

    //저장된 result변수를 json형식으로 출력
    echo json_encode(array('result'=>$result),JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

    //접속 종료
    mysqli_close($con);
?>