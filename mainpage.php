<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>mainpage</title>
</head>
<body>
<h1>Main Page</h1>

안녕하세요
<?php 
echo $_SESSION['userid'];
 ?> 님

</body>
</html>