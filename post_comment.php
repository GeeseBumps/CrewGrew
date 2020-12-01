<?php
	session_start();
	include 'db_info.php';

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	/*일단 댓글을 input으로 받고 이것을 db에 저장해야하기 때문에, 누가 작성했는지, 어떤 포스트에서 작성했는 지는 hidden input을 이용해, 계속 follow up 해야함
	그리고, 이전 post_main에서 content를 받아서 db에 저장 하고, 저장된 db를 다시 같은 post id인 저장된 데이터를 모두 select해서 표로 테이블로 만들기  */
	$Content=$_POST['Content'];
	$PPID=$_POST['PPID'];
	$ID=$_SESSION['userid'];
	$ClubID=$_POST['ClubID'];	
	
	
	
	
	$date=date('Y-m-d', time());
	$sql="insert into ppcomment(Content,Date,ppcomment_PPID,ppcomment_ClubID,ppcomment_StdID) values('$Content','$date',$PPID,$ClubID,(select StdID from student where account='$ID' ))";
	$ret = mysqli_query($con, $sql);
	if ($ret==false){
		die("DB is failed");
	
	}


?>
	<script>
		alert("등록되었습니다");
		history.back();
	</script>
	
