<?php 
function showdetails($standard,$rollno)
		{
			include('dbconn.php');
			$sql="SELECT * FROM student WHERE rollnumber='$rollno' AND standard='$standard'";
			$run=mysqli_query($conn,$sql);
			if (mysqli_num_rows($run)>0)
			{
				$data=mysqli_fetch_assoc($run);
				?>
					<table border="1" style="width: 50%; margin-top: 20px;" align="center">
							<tr>
								<th colspan="3">Student Details</th>
							</tr>
							<tr>
								<td rowspan="5"><img src="dataimg/<?php echo $data['images']; ?>" 
									style=" max-height: 150px; max-width: 120px;" /></td>
								<th>Roll NO</th>
								<td><?php echo $data['rollnumber'] ?></td>
							</tr>
							<tr>
								<th>Name</th>
								<td><?php echo $data['name'] ?></td>								
							</tr>
							<tr>
								<th>standard</th>
								<td><?php echo $data['standard'] ?></td>								
							</tr>
							<tr>
								<th>Parent contact NO</th>
								<td><?php echo $data['pcont'] ?></td>
							</tr>
							<tr>
								<th>City</th>
								<td><?php echo $data['city'] ?></td>
							</tr>
					</table>
					<?php 
			}
			else
			{
				?>

				<script type="text/javascript">
				alert('Sorry, No record found!!!!');
				</script>
				<?php			
			}
		}	
?>
		