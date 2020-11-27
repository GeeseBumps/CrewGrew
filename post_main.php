<?php
	
	$PPID=1;
	$servername = "localhost:3306";
	$username = "root";
	$password = "1234";	
	$dbname = "clubmanagement";
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connection failed!!");
	$sql ="select * from promotion_post WHERE PPID = 1";
	

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
?>
<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY align="center">
<H2> &nbsp; modifying customer information </H2>

<table align="center"  >
<TR>
<TD> <?php echo $PostTitle ?> </td>
</tr>
<tr>
<td><?php echo $PostContent ?> </td>
</tr>
</table>
<br>
<button type="button" onclick="location.href='동아리신청 공간' ">지금 신청하기</button></br>
<button type="button" onclick="location.href='메인 페이지' ">뒤로 가기</button></br>
<br>
<FORM METHOD="post"  ACTION="post_comment.php">	
<input type="text" name="Content" VALUE="댓글을 적어주세요" READONLY size="10" maxlength="20"></input><br>
<input type="hidden",name="PPID",VALUE=<?php $PPID ?>;></input><Br>
<input type="hidden",name="ClubID",VALUE=<?php $pp_ClubID ?>;></input><Br>

<input type="submit" value="Submit">
</form>
</body>
</html>





