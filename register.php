<html>
	<head>
	<title></title>
	</head>
	<body>
	<h2> Register Student </h2>
  <form action="register_action.php" method="post">
  <table bgcolor="#AA4010" width="800" cellpadding="5" cellspacing="1" align="center">
    <tr align="left">
      <td colspan="2"><font color="white"><b>&nbsp;Basic Information</b></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;*Account</td>
      <td><input type="text" name="account" value="" maxlength="10" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;*Password</td>
      <td><input type="text" name="password" value="" style="width:320"> (Password should include charcters and numbers)</td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;*Name </td>
      <td><input type="text" name="name" value="" style="width:320"></td>
    </tr>

    <tr bgcolor="white">
      <td>&nbsp;*E-mail Address</td>
      <td><input type="text" name="email" value="" style="width:320"></td>
    </tr>
    <tr align="left">
      <td colspan="2"><font color="white"><b>&nbsp;Private Information</b></td>
    </tr>
    <tr bgcolor="white">
			<td> &nbsp;University : </td>
			<td>
			<select name='univ' style='width:105'>
			<option value='KAIST'> KAIST </option>
			<option value='SNU'> SNU </option>
			<option value='POSTECH'> POSTECH </option>
			</select>
			</td>
		</tr>
    <tr bgcolor="white">
      <td>&nbsp;University Student ID</td>
      <td><input type="text" name="id" value="" maxlength="10" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td> &nbsp;Admission Year : </td>
      <td>
      <select name='year' style='width:105'>
      <option value='2020'> 2020 </option>
      <option value='2019'> 2019 </option>
      <option value='2018'> 2018 </option>
      <option value='2017'> 2017 </option>
      <option value='2016'> 2016 </option>
      <option value='2015'> 2015 </option>
      </select>
      </td>
    </tr>
    <tr bgcolor="white">
      <td> &nbsp;Admission Semester : </td>
      <td>
      <select name='semester' style='width:105'>
      <option value='spring'> Spring </option>
      <option value='fall'> Fall </option>
      </select>
      </td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Age</td>
      <td><input type="text" name="age" value="" size='5'></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Major</td>
      <td><select name="major" size="1">
        <option value="selected">Select Course</option>
        <option value="CS">Computer Science</option>
        <option value="EE">Electronical Engineering</option>
        <option value="IE">Industrial Engineering</option>
        <option value="CH">Chemistry</option>
        <option value="PH">Physics</option>
      </select></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Phone Number</td>
      <td><input type="text" name="phone1" value="" size='5'> - <input type="text" name="phone2" value="" size='8'>
       - <input type="text" name="phone3" value="" size='8'></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Course</td>
      <td><select name="course" size="1">
        <option value="selected">Select Course</option>
        <option value="bachelor">Bachelor</option>
        <option value="master">Master</option>
        <option value="ph.d">Ph.D</option>
      </select></td>
    </tr>
      <tr bgcolor="white">
        <td>&nbsp;Gender</td>
        <td><input type="radio" name="gender" value="M">Male &nbsp;
        <input type="radio" name="gender" value="F">Female &nbsp;
      </tr>
    <tr bgcolor="white">
      <td>&nbsp;Interests</td>
      <td><input type="text" name="interests" cols="80"></td>
    </tr>
    <tr bgcolor="white">
      <td>Introduce your self</td>
      <td><textarea name="intro" rows="8" cols="80"></textarea></td>
    </tr>
    <tr bgcolor="white">
      <td colspan="2"><center><input type="submit" name="" value="Submit"> &nbsp; <input type="reset" name="" value="Reset"></center></td>
    </tr>
</form>

	</body>
</html>
