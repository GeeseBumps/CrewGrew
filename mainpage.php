<?php 
session_start();
echo "안녕하세요 ".$_SESSION['userid']."님";
 ?>
<button onclick="location.href='./login.php'">로그아웃</button>
<!DOCTYPE html>
<html>
<head>
	<title>mainpage</title>
</head>
<body>
<h1>Main Page</h1>
여기서부터 코딩을 해주시기 바랍니다!
</body>
</html>