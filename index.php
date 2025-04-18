<?php 
  include('./db/dbconn.php');
  
  session_start(); //세션정보 시작

  if(isset($_SESSION['mb_id'])){ //세션 아이디가 있으면
    $userid = $_SESSION['mb_id']; //id에 세션 id저장
    $name = $_SESSION['mb_name']; //name에 세션 name을 저장
  }else{  //세션정보가 없다면 (로그인을 안한경우)
    $userid = ''; //id없음
    $name = ''; //name없음
  }
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
  <title>쇼핑몰 프로젝트 - STORE BOM</title>
  <!-- css서식 -->
  <!-- 부트스트랩 3.0버전 서식 -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- 폰트어썸 아이콘 서식 -->
  <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- 사진을 앨범처럼 꾸며주는 서식 플러그인 -->
  <link href="./css/prettyPhoto.css" rel="stylesheet" type="text/css">
  <!-- 가격정보 서식관련 -->
  <link href="./css/price-range.css" rel="stylesheet" type="text/css">
  <!-- 애니메이션 관련 -->
  <link href="./css/animate.css" rel="stylesheet" type="text/css">
  <!-- swiper.css서식 -->
  <link href="./css/swiper.css" rel="stylesheet" type="text/css">
  <!-- 메인화면 서식 -->
  <link href="./css/main.css" rel="stylesheet" type="text/css">

  <!-- jquery 1.0 -->
  <script src="./js/jquery.js"></script>
  <!-- 화면 스크롤시 동작하는 애니메이션 플러그인 -->
  <script src="./js/jquery.scrollUp.min.js"></script>
  <!-- 가격정보 관련 플러그인 -->
  <script src="./js/price-range.js"></script>
  <!-- 부트스트랩 1.0버전 -->
  <script src="./js/bootstrap.min.js"></script>
  <!-- 사진앨범관련 -->
  <script src="./js/jquery.prettyPhoto.js"></script>
  <!-- swiper.js -->
  <script src="./js/swiper.js"></script>
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
                    <?php echo $name; echo '('. $userid; echo ')'; ?>님 환영합니다.
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
  
  <!-- https://petto.kr/ -->	
  <!-- main영역 시작 -->
  <main>
    <!-- 1. 메인 슬라이드 영역 -->
    <article class="slide">
      <a href="#" title="메인배너">
        <img src="./images/home/main_banner.jpg" alt="">
      </a>
    </article>

    <!-- 2. 신상품, 이벤트, 왼쪽 카테고리 -->
    <section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">
            <h2 class="text-center title"><span>Category</span></h2>
							<div class="panel-group category-products" id="accordian">

								<!-- 카테고리 1 -->
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#cate01" title="함께하는 공간">함께하는 공간
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											</a>
										</h3>
									</div>
									<div id="cate01" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li><a href="#" title="미끄럼방지매트">미끄럼방지매트</a></li>
												<li><a href="#" title="계단">계단</a></li>
												<li><a href="#" title="하우스/침대">하우스/침대</a></li>
												<li><a href="#" title="식기테이블">식기테이블</a></li>
												<li><a href="#" title="배변매트">배변매트</a></li>
											</ul>
										</div>
									</div>
								</div>

								<!-- 카테고리 2 -->
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a href="#cate02" title="함께하는 외출" data-toggle="collapse" data-parent="#accordian">함께하는 외출
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											</a>
										</h3>
									</div>
									<div id="cate02" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li><a href="#" title="펫라이트">펫라이트</a></li>
												<li><a href="#" title="카시트">카시트</a></li>
												<li><a href="#" title="이동가방">이동가방</a></li>
												<li><a href="#" title="하네스 리드줄">하네스, 리드줄</a></li>
											</ul>
										</div>
									</div>									
								</div>

								<!-- 카테고리 3 -->
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a href="#cate03" title="함께하는 목욕">함께하는 목욕</a>
										</h3>
									</div>									
								</div>

								<!-- 카테고리 4 -->
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a href="#cate04" title="건강한 간식">건강한 간식</a>
										</h3>
									</div>									
								</div>

								<!-- 카테고리 5 -->
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a href="#cate05" title="STORY">STORY</a>
										</h3>
									</div>									
								</div>

								<!-- 카테고리 6 -->
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a href="#cate06" title="COMMUNITY">COMMUNITY</a>
										</h3>
									</div>									
								</div>
							</div>
						</div>
					</div>

          <!-- 상품목록 -->
          <?php
            $sql = "select * from shop_data where cate='cate01'";
						$result = mysqli_query($conn, $sql);
          ?>
					<div class="col-sm-9 padding-right">
						<div class="features_items">
              <!-- 제품목록 -->
              <h2 class="text-center title"><span>Features Items</span></h2>
              
              <!-- 
                1. mysqli_fetch_row : 인덱스 번호를 통해 출력 
                2. mysqli_fetch_assoc : 컬럼명을 통해 출력
                3. mysqli_fetch_array : 인덱스 or 컬럼명을 통해 출력
              -->
              <?php
                while($row = mysqli_fetch_array($result)){?>
              <div class="col-sm-4">
								<div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <p><img src="./images/shop/<?= $row['img']; ?>" alt="" style="width:200px;height:200px;"></p>
                      <p><?= $row['name']; ?></p>
                      <p><?= $row['parent']; ?></p>

                      <a href="./product_detail.php?no=<?= $row['no']; ?>" title="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>상품 상세보기</a>
                    </div>

                    <!-- 상품목록에 마우스 오버시 위에서 아래로 내려오는 박스 -->
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2><?=NUMBER_FORMAT($row['price']) ?>원</h2>
                        <p><?= $row['comment']; ?></p>
                        <a href="./product_detail.php?no=<?= $row['no']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>상품상세보기</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
					</div>
				</div>
			</div>
    </section>
  </main>

  <!-- footer영역 시작 -->
  <footer>
    <address>copyright&copy;2025 shoppingmall allrights reserved.</address>
  </footer>

  <!-- 메인관련 스크립트 -->
  <script src="./js/main.js"></script>
  
  <!-- 채널톡 서비스  -->
  <script>
  (function(){var w=window;if(w.ChannelIO){return w.console.error("ChannelIO script included twice.");}var ch=function(){ch.c(arguments);};ch.q=[];ch.c=function(args){ch.q.push(args);};w.ChannelIO=ch;function l(){if(w.ChannelIOInitialized){return;}w.ChannelIOInitialized=true;var s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="https://cdn.channel.io/plugin/ch-plugin-web.js";var x=document.getElementsByTagName("script")[0];if(x.parentNode){x.parentNode.insertBefore(s,x);}}if(document.readyState==="complete"){l();}else{w.addEventListener("DOMContentLoaded",l);w.addEventListener("load",l);}})();

  ChannelIO('boot', {
    "pluginKey": "313b8c22-ab75-429e-8998-f3aaf6facf86"
  });
</script>
</body>
</html>