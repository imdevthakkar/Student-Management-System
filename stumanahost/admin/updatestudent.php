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
<form action="updatestudent.php" method="post">
	<table align="center" class="abc">
		<tr>
			<th>Enter standerd</th>
			<td><input type="number" name="standerd" placeholder="Enter standerd" required="required"></td>
		</tr>
		<tr>
			<th>Enter student name</th>
			<td><input type="name" name="stuname" placeholder="Enter student name" required="required"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="submit" value="Search"></td>
		</tr>

	</table>
	<br>
</form>

<table align="center" width="80%" border="2">
	<tr style="background-color: black; color: white;">
		<th>No</th>
		<th>Image</th>
		<th>Name </th>
		<th>Roll NO</th>
		<th>Edit</th>		
	</tr>
	<?php
if(isset($_POST['submit']))
	{
		include('../dbconn.php');

		$standerd=$_POST['standerd'];
		$stuname=$_POST['stuname'];

		$sql="SELECT * FROM student WHERE standard='$standerd' AND name LIKE '%$stuname%' ";
		$run=mysqli_query($conn,$sql);

		if (mysqli_num_rows($run)<1)
		{
			echo "<tr><td colspan='5'>No Record found</tr></td>";		
		}
		else
		{
			$count=0;
			while ($data=mysqli_fetch_assoc($run)) 
			{
				$count++;
				?>

				<tr>
					<td><?php echo $count; ?></td>
					<td><img src="../dataimg/<?php echo $data['images'];?>" style="max-width:100px;" /></td>
					<td><?php echo $data['name']; ?> </td>
					<td><?php echo $data['rollnumber']; ?></td>
					<!-- get method thi sid name nu ek variable banayu ani value db mathi autoicrement thay che a variable id a href ma no ? pachi no posorn ena mate che  -->
					<td><a href="updateform.php?sid=<?php echo $data['id'];?>">Edit</a></td>		
				</tr>

				<?php
			}
		}
	}

?>
</table>
