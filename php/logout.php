<?php 

  session_start();// 세션 시작
  session_unset();// 모든 세션변수를 언레지스터 시켜줌
  session_destroy();// 세션 해제

  echo "<script>alert('로그아웃 되었습니다.');</script>";
  echo "<script>location.replace('../index.php');</script>";

  //사용자 쿠키까지 제거하기
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
  }

  exit;
?>