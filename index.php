<?php
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");

session_start();

if(isset($_SESSION['userid'])) { 
?>
<br/>
<script>location.replace("./main.html");</script>
<?php
}
else {
?>              
<button onclick="location.href='./login.php'">로그인</button>
<button onclick="location.href='./register.php'">회원가입</button>
        <br />
<?php   }
?>
