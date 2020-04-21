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

	include('headforad.php');
?>
	<div>
		<table align="center" class="abc">
			<tr>
				<td>1.</td><td><a href="addstudent.php">Insert Student Detail</a></td>
			</tr>
			<tr>
				<td>2.</td><td><a href="updatestudent.php">Update Student Detail</a></td>
			</tr>
			<tr>
				<td>3.</td><td><a href="deletstudent.php">Delet Student Detail</a></td>
			</tr>
		</table>
	</div>


</body>
</html>