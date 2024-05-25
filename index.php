<!DOCTYPE html>
<html>
<head>
<?php 
	session_start();

	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "admin") {
			header("location: home_admin.php");
		}
	} if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "user") {
			header("location: home_user.php");
		}
	}

	?>
	<title>Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container">
		<div class="form">
			<h1>LOGIN</h1>

	
		
<?php 
	if(isset($_GET['mail'])){
		if($_GET['mail']=="fail"){
			echo "Username atau Password salah";
		}
	}
?>
				<form action="cek_login.php" method="POST">
					<!--username password-->
					<input type="text" name="username" placeholder="Username"><br><br>
					<input type="password" name="password" placeholder="Password"><br><br>
					<!--submit-->
					<button type="login" name="login" value="login">login</button>
				</form>
		</div>	
	</div>
</body>
</html>


