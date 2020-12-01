<META http-equiv="content-type" content="text/html; charset=utf-8">
<?php
	
	$idx='PPID';
	$PPID=$_POST[$idx];
	
	include 'db_info.php';

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$sql ="select * from promotion_post WHERE PPID = $PPID";
	

	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	else{
		$row=mysqli_fetch_array($ret);
	}
	$PostTitle=$row['PostTitle'];

	$PostContent=$row['PostContent'];
	$PostImg=$row['PostImg'];
	$pp_ClubID=$row['pp_ClubID'];
	$sql1="select ClubName from club where ClubID='$pp_ClubID'";
	$club_name=mysqli_fetch_array(mysqli_query($con,$sql1))['ClubName'];
	
	
	
	echo "<HTML>";
	echo "<BODY align='center'>";
	echo "<H2> &nbsp; 동아리 홍보 페이지</H2>";

	echo "<table align='center' border=1 width = '400'  >";
	echo "<TR>";
	echo "<TD> 제목</td>";
	echo "<TD>".$PostTitle.  "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<TD> 내용</td>";
	echo "<td>".$PostContent. "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<br>";
	echo "<FORM METHOD='POST'  ACTION='apply.php'>";	
	echo "<input type='hidden' name='clubname' VALUE='$club_name'></input><Br>";
	echo "<input type='submit' value='동아리 지원하기'>";
	echo "</form>";
	echo "<button type=".'"button" onclick='.'"location.href='."'all_post_page.php'".' "'.">뒤로 가기</button></br>";
	echo "<br>";
	echo "<FORM METHOD='POST'  ACTION='post_comment.php'>";	
	echo "<input type='text' name='Content' VALUE='댓글을 적어주세요'  maxlength='20'></input><br>";
	echo "<input type='hidden' name='PPID' VALUE=$PPID ></input><Br>";
	echo "<input type='hidden' name='ClubID' VALUE=$pp_ClubID></input><Br>";

	echo "<input type='submit' value='Submit'>";
	echo "</form>";
	echo "</body>";
	echo "</HTML>";
	?>