<?php 
  // product_input.php - 상품을 db에 입력하는 파일

  //1. db연결
  include('../db/dbconn.php');

  //2. 변수선언  
  $p_cate = $_POST['p_cate'];//카테고리명
  $p_name = trim($_POST['p_name']);//상품명
  $p_price = trim($_POST['p_price']);//가격
  $p_img = $_FILES['p_myfile']['name'];//이미지파일
  $p_parent = trim($_POST['p_parent']);//요약설명
  $p_comment = trim($_POST['p_comment']);//설명
  $p_memo = trim($_POST['p_memo']);//메모

  //3. 전달받은 데이터 출력해보기
  //echo '카테고리 : ' . $p_cate . "<br>";
  //echo '상품명 : ' . $p_name . "<br>";
  //echo '가격정보 : '. $p_price . "<br>";
  //echo '이미지 : '. $p_img . "<br>";
  //echo '상품요약설명 : '. $p_parent . "<br>";
  //echo '설명 : '. $p_comment . "<br>";
  //echo '메모 : '. $p_memo . "<br>";

  //4. 이미지가 저장되도록 폴더지정해야
  if($_POST['action']=='upload'){
    $uploaded_file_name_tmp = $_FILES[ 'p_myfile' ][ 'tmp_name' ];
    $uploaded_file_name = $_FILES[ 'p_myfile' ][ 'name' ];
    $upload_folder = '../images/shop/';

    //해당 폴더에 이미지 업로드
    move_uploaded_file($uploaded_file_name_tmp,$upload_folder.$uploaded_file_name);

    //이미지 출력하기 = 테스트
    $img = $_FILES[ 'p_myfile' ][ 'name' ];
    //echo $img . '<br>';
    echo "<img src='../images/shop/".htmlspecialchars($img)."'>";
    echo "<p>".$uploaded_file_name."을(를) 업로드 하였습니다.</p>";
  }

  //테이블 설계
  /*
    CREATE TABLE `shop_data` (
    `no` int(6) NOT NULL auto_increment primary key,
    `cate` varchar(100) DEFAULT NULL,
    `img` varchar(255) NOT NULL,
    `name` varchar(20) NOT NULL,
    `parent` varchar(20) NOT NULL,
    `price` double NOT NULL,
    `comment` varchar(500) NOT NULL,
    `memo` varchar(255) NOT NULL,
    `datetime` datetime DEFAULT current_timestamp()
);
  */

  date_default_timezone_set('Asia/Seoul'); //서울지역시간
  $datetime = date('Y-m-d H:i:s', time()); //시간형식표현

  //sql쿼리문 작성하여 db에 데이터 입력
  $sql = "INSERT INTO shop_data SET
    cate='$p_cate',
    img='$p_img',
    name='$p_name',
    parent='$p_parent',
    price='$p_price',
    comment='$p_comment',
    memo='$p_memo',
    datetime='$datetime'
  ";

  //db쿼리문 실행
  $result = mysqli_query($conn, $sql);

  if($result){ //만약에 데이터베이스에 자료가 잘 입력이 된다면 성공
    echo "<script>alert('상품등록이 완료되었습니다. 이전 페이지로 이동합니다. ')</script>";
    echo "<script>location.replace('../product_mg.php');</script>";
    exit;
  }else{ //그렇지 않으면 실패
    echo "상품등록 실패 : " . mysqli_error($conn);
  }

  //데이터베이스 접속종료
  mysqli_close($conn);
  exit;
?>