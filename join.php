<?php 
  $name = '';
  $userid = '';
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
    <!-- 회원가입 폼 -->
    <section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="join_form">
              <h2>회원가입</h2>
              <form name="member_form" action="./php/member_input.php" method="POST" onsubmit="return form_check()">
                <div class="agree_box">
                  <textarea rows='6' readonly>
약관내용
제1조 [목적]  
 이 약관은 주식회사 000가 운영하는 온라인 쇼핑몰에서 제공하는 전자상거래.....
                  </textarea>
                  <p>
                    <input type="checkbox" id="agree"> 
                    <label for="agree">약관에 동의합니다.</label>
                  </p>
                </div>
                <span class="text-right">* 필수입력</span>
                <div>                  
                  <label for="mb_id">*아이디</label>
                  <input type="text" placeholder="아이디" name="mb_id" id="mb_id" maxlength="20" required>

                  <p class="id_check">
                    <span id="id_check_btn" data-check="0" class="btn btn-default" style="display: inline;">중복확인</span>
                  </p>

                  <p id="id_check"></p>
                </div>

                <!-- 2. 패스워드 입력 -->
								<div class="form">
                  <label for="pass">*비밀번호</label>
                  <input type="password" name="mb_pass" id="mb_pass" maxlength="12" required>
                </div>

                <!-- 3. 패스워드 확인 -->
                <div class="form">
                  <label for="pass2">*비밀번호 확인</label>
                  <input type="password" name="mb_pass2" id="mb_pass2" maxlength="12" required>
                </div>

                <!-- 4. 이름 입력 -->
                <div class="form">
                  <label for="name">*이름</label>
                  <input type="text" name="mb_name" id="mb_name" maxlength="5" required>
                </div>

                <!-- 5. 이메일 주소 입력 -->
                <div class="form">
                <label for="email">*이메일</label>
                  <input type="email" name="mb_email" id="mb_email" maxlength="50" required>   
                </div>

                <!-- 6. 주소 입력 -->
                <div class="form">
                  <label for="address">*주소</label>
                  <input type="text" name="mb_address" id="mb_address" maxlegnth="50" required>
                </div>

                <!-- 7. 전화번호 입력
                01011112222    11
                010-1111-2222  13
-->
                <div class="form">
                  <label for="phone">*전화번호</label>
                  <input type="text" name="mb_phone" id="mb_phone" maxlegnth="13">
                </div> 

                <input type="submit" class="btn btn-default" value="회원가입">
              </form>
            </div>
					</div>
				</div>
			</div>
    </section>
  </main>

  <!-- footer영역 시작 -->
  <footer>
    <address>copyright&copy;2023 shoppingmall allrightes resverved.</address>
  </footer>
  
  <!-- 폼체크 유효성 검사 -->
  <script>
    //전역 변수로 선언하고, AJAX 요청 결과에 따라 값을 업데이트합니다.
    let id_check_done = false;

    $(document).ready(function(){
      //사용자가 중복확인 버튼을 클릭시
      $('#id_check_btn').click(function(){ 
        let userId = $('#mb_id').val().trim(); //입력한 id값을 변수에 담는다.

        //1단계. 아이디 값이 없을 경우
        if(userId==''){ 
          //메세지를 띄운다.
          alert('아이디를 입력하세요.');
          $('mb_id').focus(); //커서의 위치를 아이디 박스에 위치시킨다. (입력을 유도하게) => UX
          return;
        }

        //2단계. 아이디가 제대로 입력된 경우 아이디 형식이 맞는지 검사
        if(!validateIdFormat(userId)){
          alert('아이디는 영문자와 숫자 조합으로 4-20자 이내여야 합니다.');
          $('mb_id').focus();
          return;
        }

        //3단계. Ajax요청을 하여 아이디 중복여부를 표시한다.
        $.ajax({
          url: './ajax/id_check.php',
          type: 'POST',
          data: {mb_id: userId},
          success: function(response){
            response = response.trim();
            if(response == 'ok'){
              $('#id_check').text('사용 가능한 아이디입니다.').css('color', 'green');
              id_check_done=true;
            }else{
              $('#id_check').text('이미 사용중인 아이디입니다.').css('color','#ff0000');
              id_check_done=false;
            }
          },
          error:function(){
            alert('서버요청 실패, 다시 시도하세요.');
          }
        });
      });

      // 아이디 값이 변경되면 다시 중복 확인 필요
      $('#mb_id').on('input', function(){
        id_check_done = false; 
      });
    });

    // 아이디 형식 검사 함수
    function validateIdFormat(userId) {
      let regex = /^[a-zA-Z0-9]{4,20}$/; // 영문 대소문자+숫자, 4~20자
      return regex.test(userId);
    }

    // 폼 제출 최종 체크
    function form_check(){
      if(!document.getElementById('agree').checked){
        alert('약관에 동의하셔야 합니다.');
        return false;
      }
      if(document.getElementById('mb_id').value.trim()==''){
        alert('아이디를 입력하세요.');
        return false;
      }
      if(!validateIdFormat(document.getElementById('mb_id').value.trim())){
        alert('아이디는 영문자와 숫자 조합으로 4~20자 이내여야 합니다.');
        return false;
      }
      if(!id_check_done){
        alert('아이디 중복 확인을 해주세요.');
        return false;
      }
      if(document.getElementById('mb_pass').value==''){
        alert('패스워드를 입력하세요.');
        return false;
      }
      if(document.getElementById('mb_pass').value!==document.getElementById('mb_pass2').value){
        alert('패스워드가 일치하지 않습니다. 다시 확인하세요.');
        return false;
      }
      if(document.getElementById('mb_name').value==''){
        alert('이름을 입력하세요.');
        return false;
      }
      if(document.getElementById('mb_email').value==''){
        alert('이메일 주소를 입력하세요.');
        return false;
      }
      if(document.getElementById('mb_address').value==''){
        alert('주소를 입력하세요.');
        return false;
      }
      if(document.getElementById('mb_phone').value==''){
        alert('전화번호를 입력하세요.');
        return false;
      }
      return true;
    }
  </script>
</body>
</html>