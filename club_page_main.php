<META http-equiv="content-type" content="text/html; charset=utf-8">

<?php

	$idx='ClubID';
	$ClubID=$_POST['ClubID'];

	include 'db_info.php';
	$sql="select * from clubpage_post where cp_ClubID=$ClubID";

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$ret = mysqli_query($con, $sql);
	echo "<html>";
	echo "<head>";
	echo "</head>";
	echo "<body align=center>";
	echo "<TABLE align= center border=1 width = '400'>";
	echo "<TR>";
	echo "<td> DATE</td>";
	echo "<td> 제목</td>";
	echo "<td> 작성자</td>";
	echo "</TR>";
	if ($ret == true){

		while ($row = mysqli_fetch_array($ret)){
			echo "<TR>";
			echo "<TD>", $row['PostDate'], "</TD>";
			echo "<TD>", $row['PostTitle'], "</TD>";
			echo "<TD>", $row['cp_StdID'], "</TD>";
			echo "<FORM METHOD='POST' ACTION='club_post_main.php'>";
			echo "<input type='hidden' name='CPID' VALUE=$row[CPID]></input>";
			echo "<TD>","<input type='submit' value='자세히보기'>","</TD>";
			echo "</FORM>";
			echo "</TR>";	
	   }
	}
	echo "</Table>";
	echo "<br>";
	echo "<button type=".'"button" onclick='.'"location.href='."'club_post_make.php'".' "'.">포스트 만들기</button></br>";

	echo "</body>";
	echo "</html>";
?>