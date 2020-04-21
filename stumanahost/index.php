<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>

	<link rel="stylesheet" type="text/css" href="css/styledev.css">
</head>
<body>
	<h3 align="right" style="margin-right: 20px;" class="al"><a href="login.php">Admin Login </a></h3>
	<h1 class="heading">Welcome to Student Management System</h1>
	<form action="index.php" method="post">
		<table  align="center"  class="tab">
			<tr>
				<td colspan="2" align="center">Student Information</td>
			</tr>
			<tr>
				<td align="left">Choose Standard</td>
				<td>
					<select name="std">
						<option value="1">1st</option>
						<option value="2">2nd</option>
						<option value="3">3rd</option>
						<option value="4">4th</option>
						<option value="5">5th</option>
						<option value="6">6th</option>
						<option value="7">7th</option>
						<option value="8">8th</option>
						<option value="9">9th</option>
						<option value="10">10th</option>
						<option value="11">11th</option>
						<option value="12">12th</option>

					</select>
				</td>
			</tr>	
			<tr>
				<td align="left">Enter Rollno</td>
				<td><input type="text" name="rollno" required="true"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 

	if (isset($_POST['submit'])) 
	{
		$standard=$_POST['std'];
		$rollno=$_POST['rollno'];
		include('dbconn.php');
		include('function.php');
		showdetails($standard,$rollno);

	}
?>