<?php
session_start();
include 'db_info.php';
$connect = mysqli_connect($servername, $username, $password, $dbname) or die("MySQL Connections Failed!");

$id=$_POST['id'];
$pw=$_POST['pw'];

$query = "select * from student where StdID='$id'";
$result = $connect->query($query);

if(mysqli_num_rows($result)==1) {
        $row=mysqli_fetch_assoc($result);
        //비밀번호가 맞다면 세션 생성
        if($row['password']==$pw){
                $_SESSION['userid']=$id;
                if(isset($_SESSION['userid'])){
                ?>      <script>
                                alert("로그인 되었습니다.");
                                location.replace("./index.php");
                        </script>
<?php
    }
else{
        echo "session fail";
}
        }

        else {
?>
<script>
      alert("아이디 혹은 비밀번호가 잘못되었습니다.");
      history.back();
</script>
<?php
        }

}
        else{
?>
<script>
        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
        history.back();
</script>
<?php
}

?>
