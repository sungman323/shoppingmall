<?php
  include('./db/dbconn.php');

  if(isset($_SESSION['mb_id'])){
    $userid = $_SESSION['mb_id'];
    $name = $_SESSION['mb_name'];
  }else{
    $userid = '';
    $name = '';
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
  <link href="./css/form.css" rel="stylesheet" type="text/css">

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
  <!-- 참고사이트 https://petto.kr/ -->	
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
                    <?php echo $name; echo '(' . $userid; echo ')'; ?>님 환영합니다.
                  </a></li>
                  <li><a href="order_list.php" title="주문정보"><i class="fa fa-shopping-cart"></i> 주문정보</a></li> 
                  <li><a href="cart.php" title="장바구니"><i class="fa fa-shopping-cart"></i> 장바구니</a></li> 
                  <li><a href="loginout.php" title="로그아웃"><i class="fa fa-user"></i> 로그아웃</a></li>
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
          <div class="col-sm-9">
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
  
  <!-- 참고사이트 https://petto.kr/ -->	
  <!-- main영역 시작 -->
  <main>
    <!-- 로그인 폼 -->
    <section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="login_form">
              <h2>로그인</h2>
              <form name="loginForm" action="./php/login_check.php" method="POST" onsubmit="return Form_check();">
                <p>
                  <label for="id">아이디 : </label>
                  <input type="text" placeholder="아이디" name="id" id="id">
                </p>
								<p>
                  <label for="password">패스워드 : </label>
                  <input type="password" placeholder="비밀번호" name="pw" id="password">
                </p>
                <p class="id_save">
                  <input type="checkbox" class="checkbox" id="id_check">
                  <label for="id_check">아이디 저장</label>
                </p>
                <input type="submit" class="btn btn-default" value="로그인">
                <p>
                  <a href="javascript:void();" onclick="kakaoLogin();" title="카카오 로그인" id="kakao_login" class="btn">
                  카카오 로그인하기</a>
                </p>
              </form>
            </div>
					</div>
				</div>
			</div>
    </section>
  </main>

  <!-- footer영역 시작 -->
  <footer>
    <address>copyright&copy;2025 shoppingmall allrightes resverved.</address>
  </footer>

  <!-- 메인관련 스크립트 -->
  <script src="./js/main.js"></script>
  <script src="./js/jquery.cookie.js"></script>
  <script>
    //유효성 검사
    function Form_check(){
      if(document.getElementById('id').value==''){
        alert('아이디를 입력하세요.');
        return false;
      }
      if(document.getElementById('password').value==''){
        alert('패스워드를 입력하세요.');
        return false;
      }
      return true;
    }

    $(document).ready(function(){
      let userid = $.cookie('id_save'); //쿠키 저장시 이름을 설정한다.

      if(userid){ //만약 userid값이 존재 한다면
        $('#id').val(userid); //id입력폼 양식에 userid값을 넣는다.
        $('#id_check').prop('checked','true'); //체크박스에 체크가 되도록 한다.
      }

      let login_btn = $('input[type=submit]'); //로그인 버튼 변수를 생성

      login_btn.click(function(){ //로그인 버튼을 클릭시
        //쿠키정보를 생성한다.
        getCookie(); //함수를 호출하여 실행
      });

      let ch = $('#id_check'); //체크박스변수 

      //쿠키생성을 위한 함수
      function getCookie(){
        if(ch.is(':checked')){ //체크박스에 체크된 경우
          let userId = $('#id').val(); //아이디값을 가져와서 변수에 담고
          $.cookie('id_save', userId,{expires:7, path:'/'}); //쿠키를 생성한다. 7일동안 유지
        }else{ //체크박스에 체크가 안된 경우라면
          //쿠키를 생성하지 않는다.
          $.removeCookie('id_save', {path:'/'}); //쿠키정보를 지운다.
        }
      }
    });
  </script>

  <!-- 카카오 로그인 api 스크립트 -->
  <script src="https://developers.kakao.com/sdk/js/kakao.js"></script> 
  <script>
    Kakao.init('acd6a6b99df823546cf3522b0eae5f33'); 
    //sdk초기화 여부판단 

    //카카오 로그인 
    function kakaoLogin() {
    //Kakao.Auth.authorize()
    Kakao.Auth.login({
      success: function (response) {
        Kakao.API.request({ 
        url: '/v2/user/me', success: function (response) {
            console.log(response)
            }, fail: function (error) { 
            console.log(error)
            }, 
          })
          }, fail: function (error) { 
          console.log(error) 
        }, 
      }) 
    } 

    //카카오 로그아웃 
    function kakaoLogout() {
      if (Kakao.Auth.getAccessToken()) { 
        Kakao.API.request({
        url: '/v1/user/unlink',
    })
    .then(function(response) {
      console.log(response);
    })
    .catch(function(error) {
      console.log(error);
    });
    // Kakao.API.request({ 
    // url: '/v1/user/unlink', success: function (response) { 
    // console.log(response) 
    // }, fail: function (error) { 
    //   console.log(error) }, 
    //});
      Kakao.Auth.setAccessToken(undefined) 
    }}
  
  </script>
</body>
</html>