<META http-equiv="content-type" content="text/html; charset=utf-8">
<?php
	session_start();
	include 'db_info.php';
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
	$ID=$_SESSION['userid'];
	
	$sql ="select * from student where account='$ID'";
	$ret = mysqli_query($con, $sql);

	$row=mysqli_fetch_array($ret);
	$stdid=$row['StdID'];
	
	
	
	
	
	
	$sql ="select * from memberlist where Position='President' and memberlist_StdID=$stdid";
	$ret = mysqli_query($con, $sql);

	if ($ret==false){
		echo "<H2> &nbsp; 관리하고 있는 동아리가 없습니다 </H2>";
	}
	else{
		$row=mysqli_fetch_array($ret);
		
		$clubid=$row['memberlist_ClubID'];
		
	
		echo "<html>";
		echo "<BODY align='center'>";
	
	
		echo "<H2> &nbsp; 동아리 기본 정보 </H2>";
		
		
		$sql1 ="select * from CLUB where ClubID ='$clubid'";
		$ret1 = mysqli_query($con, $sql1);
		$row1=mysqli_fetch_array($ret1);
		
		$name=$row1['ClubName'];
		$year=$row1['EstYear'];
		$explanation=$row1['Introduce'];
		
		echo "<table align='center' border=1 width = '400'  >";
		echo "<TR>";
		echo "<td> 동아리명 </td>";
		echo "<TD>", $name, "</TD>";
		echo "<td> 설립년도 </td>";
		echo "<TD>", $year, "</TD>";
		echo "</TR>";
		echo "<TR>";
		echo "<td> 한줄설명 </td>";
		echo "<TD colspan='3'>", $explanation, "</TD>";
		echo "</TR>";
		echo "</table>";
		

		echo "<button type=".'"button" onclick='.'"location.href='."'member_search.php'".' "'.">팀원 검색</button>";
		echo "<button type=".'"button" onclick='.'"location.href='."'member_enroll.php'".' "'.">팀원 등록</button>";
		echo "<button type=".'"button" onclick='.'"location.href='."'findclub_applylist.php'".' "'.">지원 현황</button>";
		
		
	}
	echo "</body>";
	echo "</HTML>";

?>