<?php
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
$account=$_POST[account];
$pw=$_POST[password];
$id=$_POST[id];
$email=$_POST[email];
$name=$_POST[name];
$univ=$_POST[univ];
$year=$_POST[year];
$sem=$_POST[semester];
$major=$_POST[major];
$phone1=$_POST[phone1];
$phone2=$_POST[phone2];
$phone3=$_POST[phone3];
$phone=$phone1.$phone2.$phone3;
$course=$_POST[course];
$gender=$_POST[gender];
$interests=$_POST[interests];
$intro=$_POST[intro];

$date = date('Y-m-d H:i:s');

//입력받은 데이터를 DB에 저장
$result = mysqli_query($connect, "SELECT * FROM univ WHERE UnivName='$univ'");
$row = mysqli_fetch_array($result);
$univID = $row['UnivID'];
$query = "INSERT INTO student (StdID, StdName, AdmissionYear, AdmissionSemester, Course, Gender,
 Major, Interest, Email, Phone, Introduce, student_UnivID, account, password) values ('$id', '$name', '$year', '$sem', '$course', '$gender',
 '$major', '$interests', '$email', '$phone', '$intro', '$univID', '$account', '$pw')";
$result = $connect->query($query);

//저장이 됬다면 (result = true) 가입 완료
if($result) {
?>
<script>
  alert('가입 되었습니다.');
  location.replace("./login.php");
</script>

<?php   }
else{
?>
<script>alert("fail");</script>
<?php   }
mysqli_close($connect);
?>
