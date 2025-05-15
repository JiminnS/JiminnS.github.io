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

// URL을 링크로 변환하는 함수
function makeLinks($text) {
    return preg_replace(
        '/(https?:\/\/[^\s]+)/',
        '<a href="$1" target="_blank">$1</a>',
        $text
    );
}

// 폼에서 보낸 데이터 가져오기
$date = $_POST['date'];
$category = $_POST['category'];
$title = $_POST['title'];
$content = nl2br($_POST['content']); // 줄바꿈을 <br>로 변환

$content = stripslashes($content); // '\' 제거
// $content = makeLinks($content); // URL을 링크로 변환

$image = $_FILES['fileToUload']['name'];

// 이미지 업로드 처리
$target_dir = "../img/necpower/";
$target_file = $target_dir . basename($image);
move_uploaded_file($_FILES['fileToUload']['tmp_name'], $target_file);

// $category에 따른 $category_link 설정
$category_link = $category; // 기본적으로 category와 동일하게 설정

if ($category === "언론에서 본 NEC") {
    $category_link = "news_media.php";
} else if ($category == "아세안 소식") {
    $category_link = "news_asean.php";
} else if ($category == "환경정보") {
    $category_link = "news_environ.php";
}

// blog-details 파일의 다음 순번 찾기
$directory = '.'; // 현재 디렉토리
$files = glob($directory . '/blog-details*.php');
$highestNumber = 0;

foreach ($files as $file) {
    if (preg_match('/blog-details(\d+)\.php$/', $file, $matches)) {
        $number = (int)$matches[1];
        if ($number > $highestNumber) {
            $highestNumber = $number;
        }
    }
}

// 다음 파일 이름 설정
$newFileNumber = $highestNumber + 1;
$newFileName = "blog-details{$newFileNumber}.php";

// 새로운 기사를 데이터베이스에 저장
$sql = "INSERT INTO news_kor (date, category, title, head_img, content1, link, category_link) 
        VALUES ('$date', '$category', '$title', '$target_file', '$content', '$newFileName', '$category_link')";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// template.php 파일 불러오기
$template = file_get_contents('blog-template.php');

// 템플릿에서 치환할 값 설정
$placeholders = [
    '{{title}}' => $title,
    '{{date}}' => $date,
    '{{category}}' => $category,
    '{{category_link}}' => $category_link,
    '{{image_path}}' => $target_file,
    '{{content}}' => $content,
];

// 템플릿 내용 치환
$finalContent = str_replace(array_keys($placeholders), array_values($placeholders), $template);

// 최종 PHP 파일 생성
file_put_contents($newFileName, $finalContent);

// 데이터베이스 연결 종료
mysqli_close($conn);

// 완료 메시지 출력 또는 리디렉션
echo "<script>
    alert('Data saved successfully! Created file: $newFileName');
    window.location.href = 'news_insert_kor.php';
    </script>";
?>
