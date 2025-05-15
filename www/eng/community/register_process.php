<?php
$servername = "localhost";
$username = "root";  // 데이터베이스 사용자 이름
$password = "1998";  // 데이터베이스 사용자 비밀번호
$dbname = "bbs";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 요청이 있을 때
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 비밀번호 해싱
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // 준비된 문(statement) 사용
    $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    // 쿼리 실행 및 결과 확인
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // 문(statement) 종료
    $stmt->close();
}

// 데이터베이스 연결 종료
$conn->close();
?>