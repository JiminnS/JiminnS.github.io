<?php
// 데이터베이스 연결 설정
$servername = "localhost";  // 서버 이름
$username = "necpower";  // 사용자 이름
$password = "artpapa9249!!";  // 비밀번호
$dbname = "necpower";  // 데이터베이스 이름

// MySQL 데이터베이스에 연결
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 연결 확인
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 폼에서 보낸 데이터 가져오기
$originalComment = $_POST['originalComment'];

// Prepared Statement로 쿼리 실행
$stmt = $conn->prepare("SELECT img, comment1 FROM swiper WHERE comment1 = ?");
$stmt->bind_param("s", $originalComment); // "s"는 문자열을 나타냄
$stmt->execute();

// 결과를 변수에 바인딩하여 가져오기
$stmt->bind_result($img, $comment1); // 각 컬럼을 순서대로 바인딩
$found = false;

while ($stmt->fetch()) {
    $found = true;

    // 예: 이미지 파일 삭제
    if (file_exists($img)) {
        if (!unlink($img)) {
            echo "Failed to delete image '{$img}'.<br>";
        }
    } else {
        echo "Image '{$img}' does not exist.<br>";
    }
}

// 데이터가 없을 경우 메시지 출력
if (!$found) {
    echo "<script>alert('No Swiper found with the title: $originalComment');</script>";
} else {
    // 데이터가 있으면 삭제
    $deleteStmt = $conn->prepare("DELETE FROM swiper WHERE comment1 = ?");
    $deleteStmt->bind_param("s", $originalComment);
    if ($deleteStmt->execute()) {
        echo "<script>alert('Swiper deleted successfully.');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $deleteStmt->close();
}

$stmt->close();


// 데이터베이스 연결 종료
mysqli_close($conn);

// 완료 메시지 출력 또는 리디렉션
echo "<script>
    window.location.href = 'swiper_delete_kor.php';
    </script>";
?>

