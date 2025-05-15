<?php
// MySQL 데이터베이스 연결 설정
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

// 최대 num 값 조회
// $result = mysqli_query($conn, "SELECT MAX(num) AS max_num FROM document_kor");
// $row = mysqli_fetch_assoc($result);
// $new_num = $row['max_num'] + 1;

// 폼에서 보낸 데이터 가져오기
$date = $_POST['date'];
$title = $_POST['title'];

$file = $_FILES['fileToUpload']['name'];

// 이미지 업로드 처리
$target_dir = "file/";
$target_file = $target_dir . basename($file);
$target_file_route = '../' . $target_file;



// 1. 새로운 레코드 추가 (num 컬럼은 AUTO_INCREMENT가 아님)
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file_route)) {
    $insert_sql = "INSERT INTO document_kor (date, title, docuroute) 
                   VALUES ('$date', '$title', '$target_file')";
    
    if (mysqli_query($conn, $insert_sql)) {
        // 2. 번호 재정렬 쿼리 실행
        $reorder_sql = "SET @rownum = 0;
                        UPDATE document_kor SET num = (@rownum := @rownum + 1) ORDER BY num ASC;";
        
        if (mysqli_multi_query($conn, $reorder_sql)) {
            echo "<script>
                alert('Data saved and reordered successfully!');
                window.location.href = 'document_insert_kor.php';
                </script>";
        } else {
            echo "Error during reordering: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script>
        alert('File upload failed!');
        window.history.back();
        </script>";
}
// 데이터베이스 연결 종료
mysqli_close($conn);

// 완료 메시지 출력 또는 리디렉션
echo "<script>
    alert('Data saved successfully!');
    window.location.href = 'document_insert_kor.php';
    </script>";
?>
