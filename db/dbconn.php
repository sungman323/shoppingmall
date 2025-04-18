<?php
  $mysql_host='localhost'; //호스트명
  $mysql_user='root'; //사용자명
  $mysql_password='1234'; //패스워드
  $mysql_db='kdt'; //데이터베이스명

  //데이터베이스 연결을 위한 변수 생성
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

  if(!$conn){ //연결오류 발생시 스크립트 종료한다.
    die("연결실패 : " . mysqli_connect_error());
  }

	//php 8.x이상에서는 변수선언시 값을 넣어주지 않을 시 무조건 에러가 뜨는데 이것을 안보이게 숨기는 함수.
  ini_set('display_errors', 'Off');

  //db연결이 성공시
  session_start(); //세션시작
?> 