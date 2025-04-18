<?php

  //db연결
  include('../db/dbconn.php');

  //받아온 no값 변수에 저장
  $no = $_GET['no'];

  //출력해보기
  //echo $no;

  //sql쿼리문을 작성하여 해당 no데이터를 삭제
  $sql = "DELETE FROM shop_data WHERE no = '$no'";
  $result = mysqli_query($conn, $sql); //쿼리문 실행

  if($result){ //성공적으로 데이터가 삭제가 되면
    echo "<script>alert('정상적으로 데이터가 삭제되었습니다.');</script>";
    //ehco "<script>history.back(-1);</script>";
    echo "<script>location.replace('../product_list.php')</script>";
  };

  mysqli_close($conn);
  exit;
?>