<?php
	
		include('../dbconn.php');
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$standard=$_POST['standard'];
		$sid=$_POST['sid'];
		$imgname=$_FILES['simg']['name'];
		$tempname=$_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimg/$imgname");

		$qry="UPDATE student SET rollnumber='$rollno' , name='$name' , city='$city' , pcont='$pcon' , standard='$standard' , images='$imgname' WHERE id='$sid'  ";
		if (mysqli_query($conn, $qry)) 
		{ ?>
			<script>
			alert("Information updated sucesfully!!!");
			window.open('admindash.php','_self');
			</script>
			<?php
		} 
		else {
      		echo "Error: " . $qry . "<br>" . mysqli_error($conn);	
		}


?>