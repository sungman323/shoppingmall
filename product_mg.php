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
    <title>쇼핑몰 프로젝트 - STORE BOM(관리자 상품관리)</title>
    <!-- css서식 -->
    <!-- 부트스트랩 3.0버전 서식 -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- 폰트어썸 아이콘 서식 -->
    <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- 메인화면 서식 -->
    <link href="./css/main.css" rel="stylesheet" type="text/css">
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
      <section class="product_wrap">
        <div class="container">
          <nav>
            <ul>
              <li><a href="product_mg.php" title="상품등록 추가">상품등록 추가</a></li>
              <li><a href="product_list.php" title="등록상품 목록">등록상품 목록</a></li>
              <li><a href="#" title="상품 분류 관리">상품 분류 관리</a></li>
            </ul>
          </nav>
          <div class="row">
            <div class="col-sm-12">
              <h2>상품등록</h2>
                <?php
                  // if ($_POST['action'] == "upload" ) {
                    // print_r( $_FILES[ 'myfile' ] );
                    // echo "<br><br>";
                    // echo $_FILES[ 'myfile' ][ 'name' ];
                    // echo "<br><br>";
                    // echo $_FILES[ 'myfile' ][ 'type' ];
                    // echo "<br><br>";
                    // echo $_FILES[ 'myfile' ][ 'size' ];
                    // echo "<br><br>";
                    // echo $_FILES[ 'myfile' ][ 'tmp_name' ];
                    // echo "<br><br>";
                    // echo $_FILES[ 'myfile' ][ 'error' ];

                  //   $uploaded_file_name_tmp = $_FILES[ 'myfile' ][ 'tmp_name' ];
                  //   $uploaded_file_name = $_FILES[ 'myfile' ][ 'name' ];
                  //   $upload_folder = "uploads/";
                  //   move_uploaded_file($uploaded_file_name_tmp, $upload_folder . $uploaded_file_name);

                  //   echo "<p>" . $uploaded_file_name . "을(를) 업로드하였습니다.</p>";
                  // }
                ?>
                <form action="./php/product_input.php" method="post" enctype="multipart/form-data" onsubmit="return form_check()" class="product">
                <p>
                  <label for="p_cate">*카테고리</label>
                  <select name="p_cate" id="p_cate">
                    <option value="">카테고리 선택</option>
                    <option value="cate01">함께하는 공간</option>
                    <option value="cate02">함께하는 외출</option>
                    <option value="cate03">함께하는 목욕</option>
                    <option value="cate04">건강한 간식</option>
                  </select>
                </p>
                <p>
                  <label for="p_name">*상품명</label>
                  <input type="text" id="p_name" name="p_name">
                </p>
                <p>
                  <label for="p_price">*상품가격</label>
                  <input type="text" name="p_price" id="p_price">원
                </p>

                <p>
                  <label for="p_myfile">*상품사진</label>
                  <!-- 상품 대표사진 첨부를 위한 메뉴 -->
                  <input type="file" name="p_myfile" id="p_myfile" value="파일첨부">
                  <?php 
                    // if(!isset($_POST['p_myfile'])){
                    //   echo "";
                    // }else{
                    //   echo "<img src='./uploads/".htmlspecialchars($img)."'>";
                    // }              
                  ?>
                </p>
                
                <p>
                  <label for="p_parent">*상품요약설명</label>
                  <textarea name="p_parent" id="p_parent" cols="100" rows="5"></textarea>
                  <!-- 상품 상세 설명을 위한 상세이미지 파일 첨부 -->
                  <input type="file" id="detail_img">
                </p>

                <p>
                  <label for="p_comment">*상품설명</label>
                  <textarea name="p_comment" id="p_comment" cols="100" rows="10">
                  </textarea>
                </p>

                <p>
                  <label for="p_memo">메모</label>
                  <input type="text" id="p_memo" name="p_memo">
                </p>

                <p>
                  <input type="submit" name="action" value="upload">
                  <input type="reset" value="신규 상품 등록">
                </p>

                <?php 
                  // $img = $_FILES[ 'myfile' ][ 'name' ]; 
                  // //echo $img . "<br>";
                  // echo "<img src='./uploads/".htmlspecialchars($img)."'>";
                ?>
                </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="text-center">
			<address >copyright&copy;2025 shoppingmall allrightes resverved.</address>
		</footer>

    <script>
      function form_check(){
        //1. 카테고리
          if(!document.getElementById('p_cate').value){
            alert('상품 카테고리를 선택하세요.');
            return false;
          } 
        //2. 상품명
          if(document.getElementById('p_name').value==''){
            alert('상품명을 입력하세요.');
            p_name.focus();
            return false;
          }
        //3. 상품가격
          if(document.getElementById('p_price').value==''){
            alert('상품가격을 입력하세요.');
            p_price.focus();
            return false;
          }
          
        //4. 상품사진
          if(!document.getElementById('p_myfile').value){
            alert('상품사진을 업로드하세요.');
            p_myfile.focus();
            return false;
          }
          
        //5. 상품요약설명
          if(!document.getElementById('p_parent').value){
            alert('상품요약설명을 입력하세요.');
            p_parent.focus();
            return false;
          }

        //6. 상품설명
          if(!document.getElementById('p_comment').value){
            alert('상품설명을 입력하세요.');
            p_comment.focus();
            return false;
          }
          return true;
      }
    </script>
  </body>
</html>
