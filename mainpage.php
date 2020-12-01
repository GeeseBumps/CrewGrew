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

</body>
</html>