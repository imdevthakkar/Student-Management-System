	<?php
session_start();
if (isset($_SESSION['uid']))
{
	/*jo sessionn id destroy(logout) krya vagar fari ane new tab ma kolye to fari 
	  session id bane nai (login krva nu ke nai)*/
	header('location:admin/admindash.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div>
		<button  style="color: red;position:absolute;right: 20px;font-size: 20px;"><a href="logout.php">
		logout</a> </button>
	</div>


	
	<h1 align="center"><a href="index.php"  style="text-decoration: none; color: black;" >Admin Login</a></h1>
	<form method="post" action="login.php" >
		<table align="center" class="tab">
			<tr>
				<td>Username</td><td><input type="text" name="uname" required></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="Password" name="pass" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	include ('dbconn.php');
	if (isset($_POST['login'])) 
	{
		$username=$_POST['uname'];
		$password=$_POST['pass'];

		$qry="SELECT * FROM admin WHERE username='$username'AND  password='$password'";
		$run=mysqli_query($conn,$qry);
		/*number of rows ketli mlse db mathi a suggest kare jo id & pass match tase to 1row to 
		ans ma malse j pn jo match nai thy to 0row malse atle row check krva niche nu lakyu che*/
		$row = mysqli_num_rows($run);
		if ($row<1) 
		{
			?>
			<script>
				alert('Username and Password does not match!!!!');
				window.open('login.php','$_self');
			</script>
			<?php
		}
		else
		{
			$data=mysqli_fetch_assoc($run);		
			$id=$data['id'];

			$_SESSION['uid']=$id;
			header('location:admin/admindash.php');

		}

	}
?>