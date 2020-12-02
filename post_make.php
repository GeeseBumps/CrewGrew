<?php 
session_start();

$userid = $_SESSION['userid'];


include 'db_info.php';
$sql="select StdID from student where account='$userid'";

$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
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
	echo  '<script type="text/javascript">alert("당신이 속한 동아리가 존재 하지 않습니다"); history.back(-1)</script>';
}
else{
	$count = mysqli_num_rows($ret1);
	if ($count==0) {
	   echo '<script type="text/javascript">alert("당신이 속한 동아리가 존재 하지 않습니다"); history.back(-1)</script>';
		
	}
	
	else{
		$row1=mysqli_fetch_array($ret1);
		if ($row1['Position'] !='president'){
			echo '<script type="text/javascript">alert("포스트 작성 권한이 없습니다. "); history.back(-1)</script>';
		}
	}
}




$ClubID=$row1['memberlist_ClubID'];

$sql2="select club_UnivID,FormID from club,form where club.ClubID=$ClubID and form.form_ClubID=$ClubID";
$ret2 = mysqli_query($con, $sql2);

if ($ret2==false){
	die("DB is failed");
}
else{
	$row2=mysqli_fetch_array($ret2);
}
$UnivID=$row2['club_UnivID'];
$FormID=$row2['FormID'];
echo $FormID;



?>
 
<html>
<head>
<title>make Post</title>
</head>
<body>
<h2> Register Your Club Apply Form </h2>
<form action="post_make_action.php" method="post">
<input type="hidden" name='ClubID' value=<?php echo $ClubID ?>>
<input type="hidden" name='UnivID' value=<?php echo $UnivID ?>>
<input type="hidden" name='FormID' value=<?php echo $FormID ?>>
<table bgcolor="#AA4010" width="800" cellpadding="5" cellspacing="1" align="center">
  <tr align="left">
    <td colspan="2">&nbsp;포스트 제목</td>
  </tr>
  <tr bgcolor="white">
    <td><input type="text" name="PostTitle" maxlength="100" style="width:320"></td>
  </tr>
   <tr align="left">
    <td colspan="2">&nbsp;포스트 내용</td>
  </tr>
  <tr bgcolor="white">
    <td><input type="text" name="PostContent" value="" maxlength="1000" style="width:320"></td>
  </tr>
  <tr bgcolor="white">
	<td><input type=submit value=제출></button></br></td>
  </tr>

</table>
</form>
</body>
