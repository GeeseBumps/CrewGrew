<META http-equiv="content-type" content="text/html; charset=utf-8">
<?php
	session_start();
	include 'db_info.php';
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$ID=$_SESSION['userid'];


	$name = $_POST["studentname"];
	$sql ="select * from student where account='$ID'";
	$ret = mysqli_query($con, $sql);

	$row=mysqli_fetch_array($ret);
	$stdid=$row['StdID'];
	


	$sql1 ="select * from memberlist where memberlist_StdID=$stdid and Position='President'";
	
	$ret1 = mysqli_query($con, $sql1);
	if ($ret1==false){
		die("DB is failed1");
	}
	else{
		$row1=mysqli_fetch_array($ret1);
	}
	
	$clubid=$row1['memberlist_ClubID'];

	$sql1 ="select * from student where StdName='$name'";
	$ret1 = mysqli_query($con, $sql1);
	if ($ret1==false){
		die("DB is failed2");
	}
	else{
		$row1=mysqli_fetch_array($ret1);
	}
	
	$sid=$row1['StdID'];
	
$sql = "select * from memberlist where memberlist_ClubID=$clubid and memberlist_StdID=$sid";

$result = mysqli_query($con, $sql);


if($result) {
	   $row2=mysqli_fetch_array($result);
	   
	   $a=$row2['memberlist_StdID'];
	   $b=$row2['RegistrationYear'];
	   $c=$row2['RegistrationSemester'];
	   $d=$row2['Position'];
	   echo "학번은 $a 입니다","<br>";
	   echo "등록학기는 $b,$c 입니다. <br>";
	   echo "역할은 $d 입니다.<br>";	   
   }
else{
	   echo "해당 학생은 동아리원이 아닙니다"."<br>";
	   
	} 





echo '<p><button type="button" onclick='.'"location.href='."'member_search.php'".' ">back</button>';
?>





