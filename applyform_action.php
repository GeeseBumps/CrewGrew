<?php
session_start();
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
$id = $_SESSION['userid'];
$clubname = $_POST['clubname'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];

$query = "select StdID from student where account='$id';";
$result = $connect->query($query);
$row = mysqli_fetch_array($result);
$stdid = $row['StdID'];

$query = "select ClubID from club where ClubName='$clubname';";
$result = $connect->query($query);
if(mysqli_num_rows($result)==1) {
    $row=mysqli_fetch_assoc($result);
    $clubid = $row['ClubID'];
    $query = "Select * from memberlist where memberlist_ClubID='$clubid' and memberlist_StdID='$stdid';";
    $result = $connect->query($query);
    $row = mysqli_fetch_array($result);
    echo $row['Position'];
    if($row['Position']==="president"){
    	$query = "Select * from form where form_ClubID=$clubid;";
    	$result = $connect->query($query);
    	if(mysqli_num_rows($result)==1){
            $query = "update form set Q1='$q1', Q2='$q2', Q3='$q3', Q4='$q4', Q5='$q5' where form_ClubID=$clubid;";
            $result = mysqli_query($connect, $query);
            ?>
            <script>
                alert("동아리 신청서 양식이 수정되었습니다.");
                location.replace("./all_post_page.php");
            </script>
			<?php
			}
		else {
			echo $q1;
			echo $clubid;
        	$query = "INSERT INTO form (Q1, Q2, Q3, Q4, Q5, form_ClubID) VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', $clubid);";
            $result = mysqli_query($connect, $query);
            if($result) {
			?>
			<script>
			    alert("동아리 신청서 양식이 신규 등록되었습니다.");
			    location.replace("./all_post_page.php");
			</script>
			<?php   
			}

			else{
			?>
			<script>alert("fail");</script>
			<?php  }
		}
	}
	else{?>

		<script>
        	alert("동아리 신청서 등록 권한은 해당 동아리 회장에게 있습니다.");
        	history.back();
		</script>
	<?php
	}		
}
else{
?>
<script>
    alert("가입되지 않은 동아리입니다.");
    history.back();
</script>
<?php
}
?>
