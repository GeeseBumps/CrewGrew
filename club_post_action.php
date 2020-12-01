<?php 
	$ClubID=$_POST['ClubID'];
	$UnivID=$_POST['UnivID'];
	$StdID=$_POST['StdID'];
	$PostTitle=$_POST['PostTitle'];
	$PostContent=$_POST['PostContent'];
	include 'db_info.php';
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$postdate=date('Y-m-d', time());

	$sql="insert into clubpage_post(PostDate,PostTitle,PostContent,LikeNum,cp_StdID,cp_ClubID) values('$postdate','$PostTitle','$PostContent',0,$StdID,$ClubID)";
	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	echo "포스터 작성이 완료되었습니다";




?>