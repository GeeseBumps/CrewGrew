

<META http-equiv="content-type" content="text/html; charset=utf-8">

<?php
	include 'db_info.php';
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$sql="select * from promotion_post";
	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	
	
	echo "<html>";
	echo "<head>";
	echo "</head>";
	echo "<body align=center>";
	echo "<TABLE align= center border=1 width = '400'>";
	echo "<TR>";
	echo "<td> DATE</td>";
	echo "<td> 동아리</td>";
	echo "<td> 홍보 포스터 링크</td>";
	echo "</TR>";
	while ($row = mysqli_fetch_array($ret)){
		echo "<TR>";
		$ClubID=$row['pp_ClubID'];
		$sql1="select ClubName from club where ClubID= $ClubID;";
		$ret1 = mysqli_query($con, $sql1);
		$row1 = mysqli_fetch_array($ret1);
		echo "<TD>", $row['PostDate'], "</TD>";
		echo "<TD>", $row1['ClubName'], "</TD>";
		echo "<FORM METHOD='POST' ACTION='post_main.php'>";
		echo "<input type='hidden' name='PPID' VALUE=$row[PPID]></input>";
		echo "<TD>","<input type='submit' value='지원 클릭'>","</TD>";
		echo "</FORM>";
		echo "</TR>";	
   }
	echo "</Table>";
	echo "<br>";
	echo "<button type=".'"button" onclick='.'"location.href='."'post_make.php'".' "'.">포스트 만들기</button></br>";

	echo "</body>";
	echo "</html>";
	
?>