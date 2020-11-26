<?php
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");

session_start();

if(isset($_SESSION['userid'])) {
        echo $_SESSION['userid'];?>님 안녕하세요
        <br/>
<?php
}
else {
?>              <button onclick="location.href='./login.php'">로그인</button>
        <br />
<?php   }
?>
