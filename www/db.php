<?php

    // MySQL 데이터베이스에 연결
    $db = new mysqli("localhost", "root", "1998", "bbs");

    // 연결 오류 확인
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // UTF-8 인코딩 설정
    $db->set_charset("utf8");

    // 쿼리 실행 함수 정의
    function query($query) 
    {
        global $db;
        return $db->query($query);
    }
?>

