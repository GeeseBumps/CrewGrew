<?php 
	$ClubID=$_POST['ClubID'];
	$UnivID=$_POST['UnivID'];
	$FormID=$_POST['FormID'];
	$PostTitle=$_POST['PostTitle'];
	$PostContent=$_POST['PostContent'];
	include 'db_info.php';

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$postdate=date('Y-m-d', time());

	$sql="insert into promotion_post(PostDate,PostTitle,PostContent,PostImg,LikeNum,club_form_FormID,club_univ_UnivID,pp_ClubID) 
values('$postdate','$PostTitle','$PostContent','null',0,$FormID,$UnivID,$ClubID)";
	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	}
	echo "포스터 작성이 완료되었습니다";




?>