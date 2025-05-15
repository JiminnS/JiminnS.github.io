<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: community_admin.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>

  <link rel="stylesheet" type="text/css" href="/necpower/community/css/login.css" />
</head>
<body>
  <form method="post" action="login_ok.php" class="loginForm">
    <h2>Login</h2>
    <div class="idForm">
      <input type="text" name="id" class="id" placeholder="Username">
    </div>
    <div class="passForm">
      <input type="password" name="pw" class="pw" placeholder="Password">
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