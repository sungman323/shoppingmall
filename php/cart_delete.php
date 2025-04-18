<?php
  include('../db/dbconn.php');

  session_start(); //세션정보 시작

  $no = $_GET['no']; //장바구니 상품 번호

  //사용자가 'x'누를 상품의 no와 userid가 일치하는 제품을 삭제
  $sql = "DELETE FROM shop_temp WHERE NO='$no'";

  mysqli_query($conn, $sql);
  //echo $no;
  //echo $userid;
?>
<script>
  alert('선택하신 제품이 장바구니에서 삭제되었습니다.');
  location.href='../cart.php';
</script>
