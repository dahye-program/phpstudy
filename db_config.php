<?php

//DB 정보 입력
define('HOST','localhost');//ip
define('USER','root'); //사용자 id
define('PASS',''); //암호
define('DB','test'); //DB이름

//DB에 접속
$con=mysqli_connect(HOST,USER,PASS,DB) or die('DB에 연결할 수 없습니다.');
?>