<?php

    // POST 방식일 경우에만 코드 실행
    if($_SERVER['REQUEST_METHOD']=='POST'){

        //POST로 보낸 값을 받아서 변수에 입력
        $id = $_POST['id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        
        //받아온 값을 입력 값으로 지정한 INSERT 쿼리문 작성
        $sql = "INSERT INTO memberinfo(id, name, number) VALUES ('$id','$name', $number')";

        //DB 접속 스크립트 불러옴
        require_once('db_config.php');

        //쿼리문 실행
        if(mysqli_query($con,$sql)){
            //입력 성공 시 아래 내용 출력
            echo '정보가 성공적으로 입력되었습니다.';
        }
        else{
            //입력 실패 시 아래 내용 출력
            echo '정보를 입력할 수 없습니다.';
        }
        //접속 종료
        mysqli_close($con);
    }else{
        //POST방식이 아니라면 아래 내용 출력
        echo 'Post Request가 아닙니다.';
    }
?>