<?php
session_start();
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
$id = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<head>
    <style>
      .a {
        border: 0px ;
        width: 500px;
        padding: 100px 0px;
      }
      .b {
        border: 0px ;
        background-color: 'white';
      }
      h1 {
        text-align: center;
        color: #ffffff;
      }
    </style>
</head>
<body>
<div class="a">
  <div class="b">
  <form action="apply.php" method='post'>
	 <table bgcolor="white">
	 <tr bgcolor="white">
	   <td>&nbsp;Search club you want to apply!</td>
	   <td><input type="text" name="clubname" maxlength="20" size='20' style="width:320"></td>
	   <td><center><input type="submit" name="" value="Search"></center></td>
	 </tr>
	 </table>
	</form>
  </div>
</div>
</body>
