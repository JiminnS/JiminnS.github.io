<?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "necpower";
$password = "artpapa9249!!";
$dbname = "necpower";

// MySQL 데이터베이스에 연결
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 연결 확인
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL 쿼리 실행: 모든 기사 제목과 날짜 가져오기
$sql = "SELECT comment1 FROM swiper ORDER BY idx DESC"; // 최신 기사부터 가져옴
$result = mysqli_query($conn, $sql);

$titles = [];

if (mysqli_num_rows($result) > 0) {
    // 결과를 배열로 저장
    while ($row = mysqli_fetch_assoc($result)) {
        $titles[] = [
            'original' => $row['comment1'],           // 태그가 포함된 원본 데이터
            'clean' => strip_tags($row['comment1'])   // 태그가 제거된 데이터
        ];
    }
}

// JSON 형식으로 결과 반환
header('Content-Type: application/json');
echo json_encode($titles, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// 데이터베이스 연결 종료
mysqli_close($conn);
?>
