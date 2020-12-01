<META http-equiv="content-type" content="text/html; charset=utf-8">
<?php
	
	$idx='CPID';
	$CPID=$_POST[$idx];
	
	include 'db_info.php';

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$sql ="select * from clubpage_post WHERE CPID = $CPID";
	

	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	else{
		$row=mysqli_fetch_array($ret);
	}
	$PostTitle=$row['PostTitle'];

	$PostContent=$row['PostContent'];
	$cp_ClubID=$row['cp_ClubID'];
	
	
	
	echo "<HTML>";
	echo "<BODY align='center'>";
	echo "<H2> &nbsp; 클럽 포스트</H2>";

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
	$sql1="select Content,Date,cpcomment_StdID from cpcomment where cpcomment_CPID=$CPID ORDER BY Date DESC";
	$ret1=mysqli_query($con, $sql1);
	if($ret1) {	   
	   $count = mysqli_num_rows($ret1);	   
   }
	echo "<TABLE align='center' border=1 width = '400'>";
	echo "<TR>";
	echo "<TH>DATE</TH><TH>ID</TH><TH>content</TH>";   
	echo "</TR>";
	while ($row = mysqli_fetch_array($ret1)){
		
		echo "<TD>", $row['Date'], "</TD>";
		echo "<TD>", $row['cpcomment_StdID'], "</TD>";
		echo "<TD>", $row['Content'], "</TD>";
		echo "</TR>";	
		echo "</TR>";	
   }
   echo "</Table>";
   
   echo "<BR>";
   
	echo "<button type=".'"button" onclick='.'"location.href='."'club_page_main.php'".' "'.">뒤로 가기</button></br>";
	echo "<br>";
	echo "<FORM METHOD='POST'  ACTION='club_post_comment.php'>";	
	echo "<input type='text' name='Content' VALUE='댓글을 적어주세요'  maxlength='20'></input><br>";
	echo "<input type='hidden' name='CPID' VALUE=$CPID ></input><Br>";
	echo "<input type='hidden' name='ClubID' VALUE=$cp_ClubID></input><Br>";

	echo "<input type='submit' value='Submit'>";
	echo "</form>";
	echo "</body>";
	echo "</HTML>";
	?>