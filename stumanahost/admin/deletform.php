<?php
	
		include('../dbconn.php');
		$sid=$_REQUEST['sid'];

		$qry="DELETE FROM student WHERE id='$sid'  ";
		if (mysqli_query($conn, $qry)) 
		{ ?>
			<script>
			alert("Information Deleted sucesfully!!!");
			window.open('admindash.php','_self');
			</script>
			<?php
		} 
		else {
      		echo "Error: " . $qry . "<br>" . mysqli_error($conn);	
		}


?>