<?php
  include('../db/dbconn.php');
  //전송받은 데이터 출력하기
  //member_input.php

  $mb_id = trim($_POST['mb_id']);
  $mb_pass = trim($_POST['mb_pass']);
  $mb_name = trim($_POST['mb_name']);
  $mb_email = trim($_POST['mb_email']);
  $mb_address = trim($_POST['mb_address']);
  $mb_phone = trim($_POST['mb_phone']);

  // echo 'mb_id: ' . $mb_id . "<br>";
  // echo 'mb_pass : ' . $mb_pass . "<br>";
  // echo 'mb_name: ' . $mb_name . "<br>";
  // echo 'mb_email :' . $mb_email . "<br>";
  // echo 'mb_address : ' . $mb_address . "<br>";
  // echo 'mb_phone : ' . $mb_phone . "<br>";

  // 현재지역시간으로 변경해줌
  date_default_timezone_set('Asia/Seoul');
  $mb_datetime = date('Y-m-d H:i:s', time());

  $mb_pw = PASSWORD_HASH($mb_pass, PASSWORD_DEFAULT);

  // echo $mb_id . "<br>";
  // echo $mb_name . "<br>";
  // echo $mb_pw . "<br>";
  // echo $mb_email . "<br>";
  // echo $mb_address . "<br>";
  // echo $mb_phone . "<br>";
  // echo $mb_datetime;

  //1번 방법
  $sql = "INSERT INTO members(mb_id, mb_name, mb_password, mb_email, mb_address, mb_phone, datetime) VALUES('$mb_id', '$mb_name', '$mb_pw', '$mb_email', '$mb_address', '$mb_phone', '$mb_datetime')";

  //2번 방법
  //$sql = "INSERT members SET mb_id='$mb_id', mb_name='$mb_name', mb_password='$mb_pw', mb_email='$mb_email', mb_address='$mb_address', mb_phone='$mb_phone', datetime='$mb_datetime'";

  //sql쿼리 내용을 실행한다.
  $result = mysqli_query($conn, $sql);

  mysqli_close($conn); //db종료

  if($result){ //db입력이 잘 끝나면
    echo "<script>alert('회원 가입이 완료되었습니다. 로그인 페이지로 이동합니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";
  }  
?>