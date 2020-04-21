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
	include ('../dbconn.php');

	$sid=$_GET['sid'];
	$sql="SELECT * FROM student WHERE id='$sid' ";
	$run=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($run);

?>
<form action="updatedata.php" method="post" enctype="multipart/form-data">
	<table align="center" class="abc">
		<tr>
			<th>Roll No</th>
			<td><input type="number" name="rollno" value=<?php echo $data['rollnumber'];?> required></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" value=<?php echo $data['name'];?> required></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value=<?php echo $data['city'];?> required></td>
		</tr>
		<tr>
			<th>Parents Contect No</th>
			<td><input type="text" name="pcon" value=<?php echo $data['pcont'];?> required></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="number" name="standard" value=<?php echo $data['standard'];?> required></td>
		</tr>
		<tr>
			<th>Images</th>
			<td><input type="file" name="simg"></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
			<input type="submit" name="submit" value="Submit"></td>
		</tr>

	</table>
</form>

