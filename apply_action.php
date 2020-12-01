<?php
session_start();
include 'db_info.php';

$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");

$id = $_SESSION['userid'];
$clubid = $_SESSION['clubid'];
$q1ans = $_POST['q1'];
$q2ans = $_POST['q2'];
$q3ans = $_POST['q3'];
$q4ans = $_POST['q4'];
$q5ans = $_POST['q5'];
$query = "select StdID from student where account='$id';";
$result = $connect->query($query);
$row = mysqli_fetch_array($result);
$stdid = $row['StdID'];
$dateString = date("Y-m-d", time());
$query = "select * from application where application_StdID='$stdid' and application_ClubID='$clubid';";
$result = $connect->query($query);
if(mysqli_num_rows($result)==0) {
    $tempstdid = (string)$stdid;
    $tempclubid = (string)$clubid;
    $applyid = (int)$tempclubid.$tempstdid;
    $query = "INSERT INTO application (ApplyID, ApplyDate, Q1ans, Q2ans, Q3ans, Q4ans, Q5ans, application_StdID, application_ClubID) 
    VALUES ($applyid, '$dateString' , '$q1ans', '$q2ans', '$q3ans', '$q4ans', '$q5ans', $stdid , $clubid);";
    $result = mysqli_query($connect, $query);
    if($result){
 ?>
<script>
    alert("지원이 성공적으로 완료되었습니다!");
    location.replace("./all_post_page.php");
</script>
<?php }
    else{
        echo mysqli_error($connect); 
        ?>

<?php
    }

}

else{
?>
<script>
    alert("이미 지원한 신청서가 존재합니다.");
    location.replace("./all_post_page.php");
</script>
<?php
}
?>
