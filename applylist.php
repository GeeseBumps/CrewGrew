<?php
session_start();
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
$id = $_SESSION['userid'];
$clubname = $_POST['clubname'];

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
    if($row['Position']==="president"){
    	$row=mysqli_fetch_assoc($result);
	    $query = "select * from form where form_ClubID='$clubid';";
	    $result = $connect->query($query);
	    if(mysqli_num_rows($result)==1){
	    	$row1=mysqli_fetch_assoc($result);
			$sql = "SELECT * FROM application WHERE application_ClubID='$clubid' ORDER BY ApplyDate DESC;";
			$result = mysqli_query($connect, $sql);
			echo "<style>td { border:1px solid #ccc; padding:5px; }</style>";
			echo "<table><tbody>";
			if (mysqli_num_rows($result) > 0) {
				echo "<tr>";
				echo "<td>Student ID</td><td>Q1: ".$row1["Q1"]."</td><td>Q2: ".$row1["Q2"]."</td>
				<td>Q3: ".$row1["Q3"]."</td><td>Q4: ".$row1["Q4"]."</td><td>Q5: ".$row1["Q5"]."</td><td>Apply Date</td></tr>";
				echo "</tr>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["application_StdID"]."</td><td>".$row["Q1ans"]."</td><td>".$row["Q2ans"]."</td>
					<td>".$row["Q3ans"]."</td><td>".$row["Q4ans"]."</td><td>".$row["Q5ans"]."</td><td>".$row["ApplyDate"]."</td>";
					echo "</tr>";
				}
			}
			else{
				echo "지원자가 존재하지 않습니다.";
			}
			echo "</tbody></table>";
	    }
	    else{ ?>
	    	<script>
			    alert("동아리 신청서 양식을 등록하지 않아 지원서가 존재하지 않습니다.");
			    history.back();
			</script>
		<?php
	    }
    }
    else{ ?>
    	<script>
		    alert("동아리 신청서 목록 확인 권한은 해당 동아리 회장에게 있습니다.");
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
<!DOCTYPE html>
<html>
<head>
    <style>
      .a {
        border: 0px ;
        width: 500px;
        padding: 100px 0px;
      }
      .b {
        border: 0px ;
        background-color: 'white';
      }
      h1 {
        text-align: center;
        color: #ffffff;
      }
    </style>
</head>
<body>
<div class="a">
  <div class="b">
  <form action="findstudent_info.php" method='post'>
	 <table bgcolor="white">
	 <tr>
	 	<td colspan="2">&nbsp;Search student you want to see more information by Student ID!</td>
	 </tr>
	 <tr bgcolor="white">
	   <td><input type="text" name="stdid" maxlength="20" size='20' style="width:320"></td>
	   <td><center><input type="submit" name="" value="Search"></center></td>
	 </tr>
	 </table>
	</form>
  </div>
</div>
</body>
