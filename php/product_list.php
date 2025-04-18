<?php
  include('../db/dbconn.php');
  $sql = "SELECT * FROM shop_data";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 검색엔진 최적화 - SEO -->
    <meta name="keywords" content="간식, 사료, 애견용품">
    <meta name="description" content="반려 동물용품 쇼핑몰">
    <meta name="author" content="STORE BOM 쇼핑몰">
    <title>쇼핑몰 프로젝트 - STORE BOM(관리자 상품관리)</title>
    <!-- css서식 -->
    <!-- 부트스트랩 3.0버전 서식 -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- 폰트어썸 아이콘 서식 -->
    <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- 메인화면 서식 -->
    <link href="./css/main.css" rel="stylesheet" type="text/css">
    <style>
      .product_list{
        border:1px solid #ccc;
        border-collapse:collapse;
        width:1200px;
        margin:0px auto 30px auto;
        font-size:12px;
      }
      .product_list caption{
        font-weight:bold;
        font-size:20px;
        padding:20px 0px;
      }
      .product_list th{background:#111;color:#fff;}
      .product_list td:first-child{width:50px;}
      .product_list td:nth-child(2){width:80px;}
      .product_list td:nth-child(3){width:150px;}
      .product_list td:nth-child(4){width:70px;} /* 가격 */
      .product_list td:nth-child(5){width:250px;}
      .product_list td:nth-child(6){width:230px;}
      .product_list td:nth-child(7){width:160px;}
      .product_list td:nth-child(8){width:120px;}
      .product_list td:nth-child(9){width:90px;}
      .product_list td:last-child{width:100px;}
      .product_list td, .product_list th{
        border:1px solid #ccc;
        line-height:34px;
        text-align:center;
      }
      img{width:120px;}
</style>
  </head>
  <body>
    <!-- https://petto.kr/ -->	

    <!-- header영역 시작 -->
    <header>
      <!-- 로고, 상단메뉴영역 -->
      <div class="header-middle">
        <div class="container">
          <div class="row">
            <div class="col-md-4 clearfix">
              <h1>
                <a href="index.php" title="메인페이지로 이동하기">
                  <img src="./images/logo.png" alt="상단로고" width="220">
                </a>
              </h1>
            </div>
            <div class="col-md-8 clearfix">
              <div class="shop-menu clearfix pull-right">
                <ul class="nav navbar-nav">
                  <!-- 사용자가 로그인 안한 경우 메뉴 
                    주문정보 장바구니 로그인 회원가입
                  -->
                  <?php
                    if(!$userid){ //아이디값이 없다면 아래 내용을 출력
                  ?>
                    <li><a href="order_list.php" title="주문정보"><i class="fa fa-shopping-cart"></i> 주문정보</a></li> 
                    <li><a href="cart.php" title="장바구니"><i class="fa fa-shopping-cart"></i> 장바구니</a></li> 
                    <li><a href="login.php" title="로그인"><i class="fa fa-user"></i> 로그인</a></li> 
                    <li><a href="join.php" title="회원가입"><i class="fa fa-lock"></i> 회원가입</a></li> 
                  <?php 
                  }else{              
                  ?>
                    <!-- 사용자가 로그인을 한 경우 메뉴 
                      주문정보 장바구니 아이디(별명) 로그아웃
                    -->
                    <li><a href="#" title=""><i class="fa fa-lock"></i>
                      <?php echo $name . '(' . $userid . ')'; ?>님 환영합니다.
                    </a></li>
                    <li><a href="order_list.php" title="주문정보"><i class="fa fa-shopping-cart"></i> 주문정보</a></li> 
                    <li><a href="cart.php" title="장바구니"><i class="fa fa-shopping-cart"></i> 장바구니</a></li> 
                    <li><a href="./php/logout.php" title="로그아웃"><i class="fa fa-user"></i> 로그아웃</a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 메뉴 카테고리 가로방향 -->
      <div class="header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-10">
              <!-- 토글버튼 -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle>
                  <span class="sr_only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- 가로방향 내비게이션 -->
              <div class="mainmenu pull-right">
                <ul class="nav navbar-nav collapse navbar-collapse">
                  <li><a href="index.php" title="HOME">HOME</a></li>
                  <li><a href="#" title="베스트상품">베스트상품</a></li>
                  <li><a href="#" title="MD추천상품">MD추천상품</a></li>
                  <li><a href="#" title="할인쿠폰">10&#37;할인쿠폰</a></li>
                  <li><a href="#" title="구매후기">구매후기</a></li>
                  <li><a href="#" title="질문과 답변">상품Q&amp;A</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- 메인영역 시작 -->
    <main>
      <section>
        <div class="container">
          <table class="product_list">
            <caption>상품목록 리스트</caption>
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">카테고리</th>
                <th scope="col">상품명</th>
                <th scope="col">가격</th>
                <th scope="col">요약설명</th>
                <th scope="col">설명</th>
                <th scope="col">메모</th>
                <th scope="col">상품 이미지</th>
                <th scope="col">등록일</th>
                <th scope="col">메뉴</th>
              </tr>
            </thead>
          <?php
          //no, cate, img, name, parent, price, comment, memo, datetime
          //$row = mysqli_fetch_row : 인덱스 값을 출력
          //$row = mysqli_fetch_array : 인덱스값 & 컬럼명
          //$row = mysqli_fetch_assoc : 컬럼명
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['no'] . "</td>"; //no
            echo "<td>" . $row['cate'] . "</td>"; //카테고리명
            echo "<td>" . $row['name'] . "</td>"; //상품명
            echo "<td>" . number_format($row['price'], 0, ',') . "</td>"; //가격
            echo "<td>" . $row['parent'] . "</td>"; //요약설명
            echo "<td>" . $row['comment'] . "</td>"; //설명
            echo "<td>" . $row['memo'] . "</td>"; //메모
            echo "<td><img src='../images/shop/" . $row['img'] . "' alt=''></td>"; //상품이미지
            echo "<td>" . date('Y-m-d', strtotime($row['datetime'])) . "</td>"; //등록일
            echo "<td><a href='' title=''>수정</a> <a href='' title=''>삭제</a></td>";
            echo '</tr>';
          }
          ?>
          </table>
        </div>
      </section>
    </main>

    <footer class="text-center">
			<address >copyright&copy;2025 shoppingmall allrightes resverved.</address>
		</footer>
</html>