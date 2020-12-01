<META http-equiv="content-type" content="text/html; charset=utf-8">
<?php
	session_start();
	include 'db_info.php';
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$ID=$_SESSION['userid'];


$sid = $_POST["studentID"];
$name = $_POST["studentName"];
$year = $_POST["register_year"];
$semester = $_POST["register_semester"];
$roll = $_POST["roll"];
$act = $_POST["is_active"];

	$sql ="select * from student where account='$ID'";
	$ret = mysqli_query($con, $sql);

	$row=mysqli_fetch_array($ret);
	$stdid=$row['StdID'];
	


	$sql1 ="select * from memberlist where memberlist_StdID=$stdid and Position='President'";
	
	$ret1 = mysqli_query($con, $sql1);
	if ($ret1==false){
		die("DB is failed");
	}
	else{
		$row1=mysqli_fetch_array($ret1);
	}
	
	$clubid=$row1['memberlist_ClubID'];


$sql = "insert into memberlist(memberlist_StdID, memberlist_ClubID, RegistrationYear, RegistrationSemester, isActive, Position) ";
$sql = $sql."values ($sid, $clubid, $year,'".$semester."', '".$act."', '".$roll."');";


$result = mysqli_query($con, $sql);
	
if($result) {
	   echo "Successfully Registered.<br>";
	   echo "학번은 $sid 입니다.<br>";
	   echo "이름은 $name 입니다.<br>";
	   echo "등록학기는 $year,".$semester."입니다. <br>";
	   echo "역할은 $roll 입니다.<br>";	   
   }
else{
	   echo "Register Fail!!!"."<br>";
	   echo "FAIL :".mysqli_error($con)."<br>";
	} 
echo '<p><button type="button" onclick='.'"location.href='."'member_enroll.php'".' ">back</button>';
?>

