<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>파일첨부하기</title>
  <style>
    img{width:400px;}
  </style>
</head>
<body>
  <h2>파일첨부하기 - input type='file"</h2>
  <p>php에서 이미지, 텍스트문서, pdf 등 다양한 파일을 첨부하여 서버에 업로드 할 수 있다.</p>
  <p>$_FILES변수 : 첨부한 파일명, 경로, 임시경로, 에러등의 내용을 가져올 수 있다.</p>
  <pre>
    1. input태그에 name속성을 주고
    input type="file" name"이름"

    2. php에서 $_FILES변수를 사용하여 해당 값을 가져온다.
    $_FILES['이름']['name']
    $_FILES['이름']['type']
    $_FILES['이름']['tmp_name']
    $_FILES['이름']['error']

    3. 출력하기
    $변수명 =  $_FILES['이름']['name'];
    echo '$변수명'으로 출력하여 확인

    4. 실제 폴더에 업로드 하기
    move_uploaded_file(임시경로 변수명, 업로드 폴더 변수명, 업로드할 파일 변수명);  
  </pre>
</body>
</html>

<?php 
  if($_POST['action'] == 'Upload'){
    // print_r($_FILES['myfile']);
    // echo "<br><br>";
    // echo $_FILES['myfile']['name'];
    // echo "<br><br>";
    // echo $_FILES['myfile']['type'];
    // echo "<br><br>";
    // echo $_FILES['myfile']['size'];
    // echo "<br><br>";
    // echo $_FILES['myfile']['tmp_name'];
    // echo "<br><br>";
    // echo $_FILES['myfile']['error'];

    //여기서부터 파일 업로드가 되는 지점
    $uploaded_file_name_tmp = $_FILES['myfile']['tmp_name'];
    $uploaded_file_name = $_FILES['myfile']['name'];
    $upload_folder = './uploads/';

    move_uploaded_file($uploaded_file_name_tmp, $upload_folder . $uploaded_file_name);

    echo "<p>" . $uploaded_file_name . "을(를) 업로드 완료하였습니다.</p>";
  }
?>
<form name="" action="" method="post" enctype="multipart/form-data">
  파일업로드 : <input type="file" name="myfile">
  <p>
    <input type="submit" name="action" value="Upload">
  </p>

  <div>
    <h3>첨부된 이미지 확인</h3>
    <p>htmlspecialchars함수는 특수 문자를 해당 HTML엔터티로 변환하는데 사용.</p>
    <P>이는 공격자가 웹 애플리케이션에 악성 코드를 삽입할 수 있는 XSS(교차 사이트 스크립팅)공격과 같은 잠재적인 보안 취약성을 방지하는 데 특히 유용.</P>
    <P>enctype="multipart/form-data" : 모든 문자를 인코딩하지 않음을 명시함. 주로 파일이나 이미지를 서버로 전송하고자 할 때 사용한다.</P>
    
    <?php
      $img = $_FILES['myfile']['name'];

      echo "<img src='./uploads/" . htmlspecialchars($img) . "'>"
    ?>    
  </div>
</form>