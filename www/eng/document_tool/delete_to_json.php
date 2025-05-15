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
$titleToDelete = $_POST['title'];

// 데이터베이스에서 해당 제목의 기사 찾기
$sql = "SELECT * FROM document_eng WHERE title = '$titleToDelete'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // 해당 기사를 찾았을 경우
    $document = mysqli_fetch_assoc($result);
    
    // 링크 파일 삭제
    $filePath = '../' . $document['docuroute'];  // 파일 경로 생성
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            // echo "File '{$filePath}' deleted successfully.<br>";
        } else {
            echo "Failed to delete file '{$filePath}'.<br>";
        }
    } else {
        echo "File '{$filePath}' does not exist.<br>";
    }

    $deleteSql = "DELETE FROM document_eng WHERE title = '$titleToDelete'";
    if (mysqli_query($conn, $deleteSql)) {
        // 삭제 성공 후 번호 재정렬
        $reorderSql = "SET @rownum = 0;
                       UPDATE document_eng SET num = (@rownum := @rownum + 1) ORDER BY num ASC;";
        if (mysqli_multi_query($conn, $reorderSql)) {
            echo "<script>alert('Document deleted and reordered successfully.');</script>";
        } else {
            echo "Error during reordering: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

} else {
    // 기사가 없을 경우
    echo "<script>alert('No document found with the title: $titleToDelete');</script>";
}

// 데이터베이스 연결 종료
mysqli_close($conn);

// 완료 메시지 출력 또는 리디렉션
echo "<script>
    window.location.href = 'document_delete_eng.php';
    </script>";
?>
