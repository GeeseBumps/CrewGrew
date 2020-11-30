<?php
session_start();
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");
$stdid = $_POST['stdid'];

$query = "select * from student where StdID='$stdid';";
$result = $connect->query($query);
echo "<style>td { border:1px solid #ccc; padding:5px; }</style>";
echo "<table><tbody>";
if (mysqli_num_rows($result) > 0) {
	echo "<tr>";
	echo "<td> Student ID </td><td> Student Name </td><td>Admission Year</td>
	<td>Admission Semester</td><td>Course</td><td>Gender</td><td>Age</td><td> Major </td><td> Interest</td><td> Email </td><td> Phone </td><td> Introduce </td></tr>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row["StdID"]."</td><td>".$row["StdName"]."</td><td>".$row["AdmissionYear"]."</td>
		<td>".$row["AdmissionSemester"]."</td><td>".$row["Course"]."</td><td>".$row["Gender"]."</td><td>".$row["Age"]."</td><td>".$row["Major"]."</td><td>".$row["Interest"]."</td><td>".$row["Email"]."</td><td>".$row["Phone"]."</td><td>".$row["Introduce"]."</td>";
		echo "</tr>";
	}
}
else{
	echo "해당 학생이 존재하지 않습니다.";
}