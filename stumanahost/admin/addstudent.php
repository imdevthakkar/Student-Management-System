<?php

	session_start();
			if (isset($_SESSION['uid']))
			{
				echo "";				
			}
			else
			{
				/*koi pn browser ma direct a page nu url kole to ane redirect kari ne 
				login page pr lai java aave mate lakyu che*/
				header('location:../login.php');
			}
?>
<?php

	include('header.php');
?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<table align="center" class="abc">
		<tr>
			<th>Roll No</th>
			<td><input type="number" name="rollno" placeholder="Enter Roll no" required="required"></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter Full Name" required="required"></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter City" required="required"></td>
		</tr>
		<tr>
			<th>Parents Contect No</th>
			<td><input type="text" name="pcon" placeholder="Enter Contect no of Parents" required="required"></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="number" name="standard" placeholder="Enter Standard" required="required"></td>
		</tr>
		<tr>
			<th>Images</th>
			<td><input type="file" name="simg"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
		</tr>

	</table>
</form>
</body>
</html>
<?php

if(isset($_POST['submit']))
	{
		include('../dbconn.php');
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$standard=$_POST['standard'];
		$imgname=$_FILES['simg']['name'];
		$tempname=$_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimg/$imgname");

		$qry="INSERT INTO student (rollnumber,name,city,pcont,standard,images) VALUES ('$rollno','$name','$city','$pcon','$standard','$imgname')";
		if (mysqli_query($conn, $qry)) 
		{ ?>
			<script>
			alert("Information added sucesfully!!!");
			</script>
			<?php
		} 
		else {
      		echo "Error: " . $qry . "<br>" . mysqli_error($conn);	
		}

	}
?>
