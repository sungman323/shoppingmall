<?php 
	session_start();

  include('./db/dbconn.php'); //db연결
	
	//만약에 세션 아이디 값이 있다면
	if(isset($_SESSION['mb_id'])){
		$userid = $_SESSION['mb_id'];  //id를 저장
		$username = $_SESSION['mb_name']; //name을 저장
	}else{ //그렇지 않다면
		$userid = '';  //id없음
		$username = ''; //name없음
	}

  $no = mysqli_real_escape_string($conn, $_GET['no']);
	//echo $userid . '<br>';

  // 카테고리 번호 출력
  //echo $no;

  $sql = "select * from shop_data where no='$no'";
  $result=mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	$no = $row['no']; //상품번호
	$name = $row['name']; //상품명
	$comment = $row['comment']; //상품설명
	$memo = $row['memo']; //보조설명
	$price = $row['price']; //상품가격
	$img = $row['img']; //상품사진(대표)
	//$img_detail = $row['img2']; //상세페이지 이미지

?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="반려동물용품 쇼핑몰">
		<meta name="author" content="STORE BOM 쇼핑몰">
		<meta property="og:title" content="<?=$name?>">
		<meta property="og:image" content="./images/shop/<?=$img?>">
		<meta property="og:description" content="<?=$comment?>">
		<title>STORE BOM - <?=$name?>페이지</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
		<script src="js/jquery.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	</head>
	<!--/head-->
	<body>
		<header id="header"><!--header-->
			<div class="header-middle"><!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-md-4 clearfix">
							<h1 class="logo pull-left">
								<a href="index.php"><img src="./images/logo.png" alt="상단로고" width="220" /></a>
							</h1>
						</div>
						<div class="col-md-8 clearfix">
							<div class="shop-menu clearfix pull-right">
								<ul class="nav navbar-nav">
									<?php
									if(!$userid) {
									?>
										<li><a href="order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
										<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
										<li><a href="login.php"><i class="fa fa-user"></i>로그인</a></li>
										<li><a href="sign.php"><i class="fa fa-lock"></i>회원가입</a></li>
									<?php
									} else {
									?>
										<li><a href="#"><i class="fa fa-lock"></i>
										<?php echo $username; echo '('. $userid; echo ')'; ?>님 환영합니다.</a></li>
										<li><a href="order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
										<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
										<li><a href="./php/logout.php"><i class="fa fa-user"></i>로그아웃</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header-middle-->

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
		</header><!--/header-->
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">
							<h2 class="title"><span>Category</span></h2>
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
								<div class="panel panel-default">

									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#cate01">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												함께하는 공간
											</a>
										</h4>
									</div>
									<div id="cate01" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li><a href="cate.php?cate=cate01">미끄럼방지매트</a></li>
												<li><a href="cate.php?cate=cate01">계단</a></li>
												<li><a href="cate.php?cate=cate01">하우스/침대</a></li>
												<li><a href="cate.php?cate=cate01">식기테이블</a></li>
												<li><a href="cate.php?cate=cate01">배변매트</a></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#cate02">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												함께하는 외출
											</a>
										</h4>
									</div>
									<div id="cate02" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li><a href="cate.php?cate=cate02">펫라이트</a></li>
												<li><a href="cate.php?cate=cate02">카시트</a></li>
												<li><a href="cate.php?cate=cate02">이동가방</a></li>
												<li><a href="cate.php?cate=cate022">하네스, 리드줄</a></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="cate.php?cate=cate03">함께하는 목욕</a></h4>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="cate.php?cate=cate04">건강한 간식</a></h4>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#">Story</a></h4>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#">Community</a></h4>
									</div>
								</div>

							</div><!--/category-products-->
						</div>
					</div>

					<!-- 상품상세페이지 -->
					<div class="col-sm-9 padding-right">
						<!-- <h2 class="title text-center">Product Detail</h2> -->
						<div class="product-details"><!--상품 디테일-->
							<div class="col-sm-5">
									<div class="view-product">
										<img src="./images/shop/<?=$img?>" alt="대표사진">
									</div>

									<div id="similar-product" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner">
												<?php 
													$sql = "select img, no from shop_data";
													$result2 = mysqli_query($conn, $sql);
													$count = 0;
													$active = true;

													while ($row2 = mysqli_fetch_array($result2)){
														if ($count % 3 == 0) {
															if ($count > 0) echo '</div>'; // 이전 item 닫기
															echo '<div class="item' . ($active ? ' active' : '') . '">';
															$active = false;
														}
												?>
													<a href="product_detail.php?no=<?=$row2['no']?>">
														<img src="./images/shop/<?=$row2['img']?>" alt="" style="width:70px;height:70px;">
													</a>
												<?php 
													$count++;
													}
													if($count>0) echo '</div>';
												?>
										</div>
										<!-- Controls -->
										<a class="left item-control" href="#similar-product" data-slide="prev"><i class="fa fa-angle-left"></i>
										</a>
										<a class="right item-control" href="#similar-product" data-slide="next"><i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>

						<!-- 오른쪽 상품제목, 가격, 수량, 버튼, new아이콘 -->
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="./images/product-details/new.jpg" class="newarrival" alt="">
								<form action="./php/cart_insert.php?no=<?=$no?>" method="POST">
								<h2><?=$name?></h2>
								<p>상품번호: <?=$no?></p>
								<img src="./images/product-details/rating.png" alt="상품평 별점" />
								<br>
								<span>
									<span><?=NUMBER_FORMAT($price) ?>원</span>
									<br>
									<label>수량:</label>
									<input type="number" name="quantity" id="quantity" value="1" min="1">
									<br>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										장바구니 추가
									</button>
									<br>
								</span>
								<p><b>제품 정보:</b> <?=$comment?></p>
								</form>
							</div><!--/product-information-->
						</div>
					</div>

					<div class="detail_text">
						<hr>
						<!-- 상세페이지 - 설명문구, 상세페이지 이미지로 삽입 -->
						<p><?=$memo?></p>
						<img src="./images/shop/<?=$img?>" alt="상세페이지">
					</div>									
				</div>
			</div>
		</section>
		
		<footer class="text-center">
			<address>copyright&copy;2025 shoppingmall allrightes resverved.</address>
		</footer>
	</body>
</html>