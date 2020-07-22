<?php
    $host='localhost'; //mysql이 설치된 pc의 주소
    $uname='root'; //mysql id
    $pwd=''; //mysql pw
    $db="hedgehogmember"; //db 이름

    $con=mysqli_connect($host,$uname,$pwd) or die("connection failed");
    mysqli_select_db($db,$con) or die("db selection failed");

    $id=$_GET['status']; //get방식으로 status값을 가져옴

    $r=mysqli_query("select name, num from hedgehoginfo where ID='$status",$con); //status 값을 기준으로 name, num 값 읽어옴

    $row=mysqli_fetch_array($r); //읽어온 값 row라는 변수에 넣어줌

    print(json_encode($row)); //row변수를 json으로 인코딩해서 print
    mysqli_close($con); //mysql 접속 끊기
?>