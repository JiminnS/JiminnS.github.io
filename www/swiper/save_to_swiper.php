<?php
// MySQL 데이터베이스에 연결
$servername = "localhost"; // 서버 이름
$username = "necpower";    // 데이터베이스 사용자 이름
$password = "artpapa9249!!";        // 데이터베이스 비밀번호 
$dbname = "necpower";      // 데이터베이스 이름

// MySQL 연결
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 연결 확인
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// slidesData가 전송되었는지 확인
if (isset($_POST['slidesData'])) {
    // slidesData의 내용을 확인
    // echo "Received slidesData: " . $_POST['slidesData'] . "<br>";

    // JSON 배열 디코딩
    $slidesData = json_decode($_POST['slidesData'], true);

    // JSON 디코딩 오류 확인
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("JSON decoding error: " . json_last_error_msg());
    }

    foreach ($slidesData as $index => $slide) {
        // Running time과 comment를 폼에서 가져옴
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $comment = mysqli_real_escape_string($conn, $_POST['comment']); 

        // 파일 처리 - 비디오 또는 이미지
        if ($slide['type'] === 'video' && isset($_FILES['videoFiles']['tmp_name'][$index])) {
            $videoExtension = pathinfo($_FILES['videoFiles']['name'][$index], PATHINFO_EXTENSION); // 원래 확장자 추출
            $videoFileName = uniqid() . '.' . $videoExtension; // 원래 확장자 사용
            $target_file_video = "../swiper/video/" . $videoFileName;

            // 파일 업로드
            if (!move_uploaded_file($_FILES['videoFiles']['tmp_name'][$index], $target_file_video)) {
                die("Error uploading video file.");
            }

            // 이미지 필드가 비어있을 수 있으므로 빈 값으로 설정
            $imageFileName = '';
        } else if ($slide['type'] === 'image' && isset($_FILES['imageFiles']['tmp_name'][$index])) {
            $imageExtension = pathinfo($_FILES['imageFiles']['name'][$index], PATHINFO_EXTENSION); // 원래 확장자 추출
            $imageFileName = uniqid() . '.' . $imageExtension; // 원래 확장자 사용
            $target_file_image = "../swiper/img/" . $imageFileName;

            // 파일 업로드
            if (!move_uploaded_file($_FILES['imageFiles']['tmp_name'][$index], $target_file_image)) {
                die("Error uploading image file.");
            }

            // 비디오 필드가 비어있을 수 있으므로 빈 값으로 설정
            $videoFileName = '';
        } else {
            die("Invalid file type or missing file.");
        }

        // 데이터베이스에 파일 이름만 저장
        $sql = "INSERT INTO swiper (video, img, time, comment1) 
                VALUES ('$target_file_video', '$target_file_image', '$time', '$comment')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// 데이터베이스 연결 종료
mysqli_close($conn);

// 완료 메시지 출력 또는 리디렉션
echo "<script>
    alert('Data saved successfully!');
    window.location.href = 'swiper_insert_kor.php';
    </script>";
?>

