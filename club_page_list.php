<?php
	


	session_start();

	$userid = $_SESSION['userid'];
	if (empty($userid)){
		echo '<script type="text/javascript">alert("로그인을 해주세요"); history.back(-1)</script>';
		error_reporting(0); 
	}
	
	echo 'user: ';
	echo $userid;
	include 'db_info.php';
	$sql="select StdID from student where account='$userid' ;";

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	$row=mysqli_fetch_array($ret);

	$StdID=$row['StdID'];
	$sql1="select memberlist_ClubID from memberlist where memberlist_StdID=$StdID ;";
	$ret1 = mysqli_query($con, $sql1);
	if ($ret1==false){
	'<script type="text/javascript">alert("당신이 속한 동아리가 존재 하지 않습니다"); history.back(-1)</script>';
	}
	else{
		$count = mysqli_num_rows($ret1);
		if ($count==0) {
			echo '<script type="text/javascript">alert("당신이 속한 동아리가 존재 하지 않습니다"); history.back(-1)</script>';		   	
	}
	
	}
	
	while ($row1 = mysqli_fetch_array($ret1)){
		echo "<FORM METHOD='POST' ACTION='club_page_main.php'>";
		$sql2="select ClubName from club where ClubID=$row1[memberlist_ClubID] ;";
		$ret2 = mysqli_query($con, $sql2);
		$row2=mysqli_fetch_array($ret2);
		$ClubID=$row1['memberlist_ClubID'];
	
		echo "<TD>","<input type='submit' value='$row2[ClubName]'>","</TD>";
		echo "<input type='hidden' name='ClubID' VALUE=$ClubID></input>";
		echo "</FORM>";
		
	
	}
?>