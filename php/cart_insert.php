<?php 
// cart_insert.php   장바구니에 담기 위한 쿼리

  include('../db/dbconn.php');

  // 필수 값 체크
  if (!isset($_GET['no']) || !isset($_POST['quantity'])) {
    exit('잘못된 접근입니다.');
  }

  $no = intval($_GET['no']); // 번호를 정수형으로 캐스팅하여 보안 강화
  $quan = intval($_POST['quantity']); // 수량도 정수형으로 변환

  session_start(); //세션정보 시작
  $session_id=session_id();

  //echo $no;
  //echo $session_id;

  //클릭한 상품정보를 조회하기 위한 쿼리문을 실행
  $sql = "SELECT * FROM shop_data WHERE no=$no";
  $result = mysqli_query($conn, $sql);

  // 상품이 존재하지 않는 경우
  if (!$row = mysqli_fetch_assoc($result)) {
      mysqli_close($conn);
      exit('상품을 찾을 수 없습니다.');
  }

  $regdate = time();  //현재날짜 함수

  //제품사진, 상품명, 가격, 수량
  $img = $row['img']; //제품이미지
  $name = $row['name']; //제품명
  $price = $row['price']; //가격
  $parent = $row['parent']; //설명
  $comment = $row['comment']; //보조설명

  $money = $quan * $row['price']; //총합계 수식

  //sql 쿼리문을 작성하여 위 변수값을 테이블에 삽입한다.
  $sql = "INSERT INTO shop_temp(name, parent, count, price, money, img, comment, session_id) VALUES('$name','$parent','$quan','$price', '$money', '$img', '$comment','$session_id')";

  //sql쿼리문 실행하기
  mysqli_query($conn, $sql);

  mysqli_close($conn);

  //장바구니 페이지로 이동
  echo "<script>location.replace('../cart.php');</script>";
  exit;
?>