<?php
session_start(); // 세션 시작

// 모든 세션 변수 제거
session_unset(); 

// 세션 종료
session_destroy(); 

// 로그인 페이지로 리디렉션
header("Location: community.php");
exit();
?>
