<html>
	<head>
	<title></title>
	</head>
	<body align='center'>
		<form method="post" action="member_enroll_result.php">
		<table align='center' border='1' width='400' height='300'>
		<tr align='center'>
			<td>
			학번 : <input type="text" name="studentID" size="10" maxlength="8"></input><br>
			</td>
		</tr>
		<tr align='center'>
			<td>
			이름 &nbsp;: <input type="text" name="studentName" size="10" maxlength="15"></input><br>
			</td>
		</tr>
		<tr align='center'>
			<td>
			등록년도 선택 : 
			<input type="radio" name="register_year" value="2017"> 2017년 </input>
			<input type="radio" name="register_year" value="2018"> 2018년 </input>
			<input type="radio" name="register_year" value="2019"> 2019년 </input>
			<input type="radio" name="register_year" value="2020"> 2020년 </input>
			
			</td>
		</tr>
		<tr align='center'>
			<td>
			등록학기 선택 : 
			<input type="radio" name="register_semester" value="spring"> 봄학기 </input>
			<input type="radio" name="register_semester" value="fall"> 가을학기 </input>
			
			</td>
		</tr>
		<tr align='center'>
			<td>
			활동여부 : 
			<input type="radio" name="is_active" value="Y"> 예 </input>
			<input type="radio" name="is_active" value="N"> 아니오 </input>
			
			</td>
		</tr>
		<tr align='center'>
			<td>
			역할 선택<br><br>
			<input type="radio" name="roll" value="President"> 회장 </input>
			<input type="radio" name="roll" value="Vice President"> 부회장 </input>
			<input type="radio" name="roll" value="Accounter"> 총무 </input>
			<input type="radio" name="roll" value="Member"> 동아리원 </input>
			</td>
		</tr>
		<tr align='center'>			
			<td>
				<input type="submit" value="Register" onclick="location.href='member_enroll_result.php'" ></input>
				<!-- 뒤로 가기 버튼(back)은 채점 대상 아닙니다.-->
				<button type="button" onclick="location.href='club_manage_main.php'">back</button>
			</td>
		</tr>		
		</table>
		</form>
		
		<br>
	</body>
</html>