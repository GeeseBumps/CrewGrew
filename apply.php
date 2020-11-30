<?php
session_start();
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
$id = $_SESSION['userid'];
$clubname = $_POST['clubname'];
$_SESSION['clubname'] = $clubname;

$query = "select ClubID from club where ClubName='$clubname';";
$result = $connect->query($query);
if(mysqli_num_rows($result)==1) {
    $row=mysqli_fetch_assoc($result);
    $clubid = $row['ClubID'];
    $_SESSION['clubid'] = $clubid;
    $query = "select * from form where form_ClubID='$clubid';";
    $result = $connect->query($query);
    if(mysqli_num_rows($result)==1){
    	$row=mysqli_fetch_assoc($result);
    	$q1 = $row['Q1'];
    	$q2 = $row['Q2'];
    	$q3 = $row['Q3'];
    	$q4 = $row['Q4'];
    	$q5 = $row['Q5'];
    }
    else{ ?>
    	<script>
		    alert("동아리 신청서 양식을 등록하지 않아 지원할 수 없습니다.");
		    history.back();
		</script>
	<?php
    }
}
else{
?>
<script>
    alert("가입되지 않은 동아리입니다.");
    history.back();
</script>
<?php
}

?>
<html>
<head>
<title>applyform</title>
</head>
<body>
<h2> Application of <?php echo $clubname;?></h2>
<form action="apply_action.php" method="post">
<table bgcolor="#AA4010" width="800" cellpadding="5" cellspacing="1" align="center">
  <tr align="left">
    <td colspan="2">&nbsp;<?php echo $clubname; ?> 지원서</td>
  </tr>
  <tr bgcolor="white">
    <td>&nbsp;<?php echo $q1; ?></td>
    <td><textarea name="q1" rows="8" cols="80"></textarea></td>
  </tr>
  <tr bgcolor="white">
    <td>&nbsp;<?php echo $q2; ?></td>
    <td><textarea name="q2" rows="8" cols="80"></textarea></td>  
  </tr>
  <tr bgcolor="white">
    <td>&nbsp;<?php echo $q3; ?></td>
    <td><textarea name="q3" rows="8" cols="80"></textarea></td>
  </tr>
  <tr bgcolor="white">
    <td>&nbsp;<?php echo $q4; ?></td>
    <td><textarea name="q4" rows="8" cols="80"></textarea></td>
  </tr>
  <tr bgcolor="white">
    <td>&nbsp;<?php echo $q5; ?></td>
    <td><textarea name="q5" rows="8" cols="80"></textarea></td>
  </tr>
  <tr bgcolor="white">
    <td colspan="2"><center><input type="submit" name="" value="Submit"> &nbsp; <input type="reset" name="" value="Reset"></center></td>
  </tr>
</table>
</form>
</body>
