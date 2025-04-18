<?php
  //db연결
  include_once '../db/dbconn.php';
  
  //post값이 있다면 (빈공간이 아니라면)
  $mb_id = trim($_POST['mb_id']);

  //sql쿼리문을 실행하여 mb_id조회
  $sql = "SELECT * FROM members WHERE mb_id = '$mb_id'";

  //쿼리조회 결과를 $result담는다.
  $result = mysqli_query($conn, $sql);

  //id가 일치하는 해당하는 자료가 1개라도 있는가??
  if(mysqli_num_rows($result) > 0){
    echo "fail"; //이미 id가 존재
  }else{
    echo "ok"; //id를 사용가능
  }
  
  mysqli_close($conn);//db종료
?>