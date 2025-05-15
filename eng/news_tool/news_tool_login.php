<?php
session_start();

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

// 로그인 처리
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // 데이터베이스에서 사용자 정보 확인
    $sql = "SELECT * FROM member WHERE id = '$user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // 비밀번호 확인
        if ($pass === $row['pass']) {  // 123으로 비밀번호가 저장되어 있는 경우 직접 비교
            // 세션 설정
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;
            
            // 세션에 저장된 이전 페이지로 리디렉션
            $redirect = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'default_page.php';
            unset($_SESSION['redirect_url']); // 한 번 사용한 후 세션에서 삭제
            header("Location: $redirect");
            exit;
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found.');</script>";
    }
}

mysqli_close($conn);
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="news_insert_login.php">
        <label>Username: <input type="text" name="username"></label><br>
        <label>Password: <input type="password" name="password"></label><br>
        <button type="submit">Login</button>
    </form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>

  <link rel="stylesheet" type="text/css" href="../css/login.css" />
</head>
<body>
  <form method="post" action="news_tool_login.php" class="loginForm">
    <h2>Login</h2>
    <div class="idForm">
      <input type="text" name="username" class="id" placeholder="Username">
    </div>
    <div class="passForm">
      <input type="password" name="password" class="pw" placeholder="Password">
    </div>
    <button type="submit" class="btn" onclick="button()">
      LOGIN
    </button>
    <!-- <div class="bottomText">
      <a href="#">Sign up</a>
    </div> -->
  </form>
</body>
</html>