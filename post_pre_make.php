<?php 
	session_start();

	$userid = $_SESSION['userid'];

	include 'db_info.php';
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$sql="select StdID from student where account='$userid'";
	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	else{
		$row=mysqli_fetch_array($ret);
	}
	$StdID=$row['StdID'];
	$sql1="select memberlist_ClubID,Position from memberlist where memberlist_StdID=$StdID";
	$ret1 = mysqli_query($con, $sql1);
	if ($ret1==false){
		'<script type="text/javascript">alert("당신이 속한 동아리가 존재 하지 않습니다"); history.back(-1)</script>';
	}
	else{
		$count = mysqli_num_rows($ret1);
		if ($count==0) {
		   echo '<script type="text/javascript">alert("당신이 속한 동아리가 존재 하지 않습니다"); history.back(-1)</script>';		   	
		}
		$row1=mysqli_fetch_array($ret1);
	}
	

	if ($row1['Position'] !='president'){
		echo '<script type="text/javascript">alert("포스트 작성 권한이 없습니다. "); history.back(-1)</script>';
	}
	else{
		$ClubID=$row1['memberlist_ClubID'];
	}
	echo "<FORM METHOD='POST' ACTION='post_make.php'>";
	echo "<input type='hidden' name='ClubID' value=$ClubID></input>";
	echo "</form>";

	
	

	
?>
	


