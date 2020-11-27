<?php 
session_start();
$userid = $_SESSION['userid'];
echo 'user: ';
echo $userid;
 ?>
 
<html>
	<head>
	<title>applyform</title>
	</head>
	<body>
	<h2> Register Your Club Apply Form </h2>
  <form action="applyform_action.php" method="post">
  <table bgcolor="#AA4010" width="800" cellpadding="5" cellspacing="1" align="center">
    <tr align="left">
      <td colspan="2">&nbsp;Q1, Q2, Q3 are Mandatory! Please submit at least three questions.</td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Club Name</td>
      <td><input type="text" name="clubname" maxlength="100" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;*Q1</td>
      <td><input type="text" name="q1" value="" maxlength="100" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;*Q2</td>
      <td><input type="text" name="q2" value="" maxlength="100" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;*Q3</td>
      <td><input type="text" name="q3" value="" maxlength="100" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Q4</td>
      <td><input type="text" name="q4" value="" maxlength="100" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td>&nbsp;Q5</td>
      <td><input type="text" name="q5" value="" maxlength="100" style="width:320"></td>
    </tr>
    <tr bgcolor="white">
      <td colspan="2"><center><input type="submit" name="" value="Submit"> &nbsp; <input type="reset" name="" value="Reset"></center></td>
    </tr>
  </form>