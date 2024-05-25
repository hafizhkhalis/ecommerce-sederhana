<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
<?php 
	session_start();

	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "admin") {
			header("location: home_admin.php");
		}
	} else {
		header("location: index.php");
	}

	?>
	<title>Home User</title>
</head>
<body>
<nav>
	<a href="home_user.php">Home</a>
 	<a href="list_barang_user.php">Tabel Barang</a>
	<a href="history.php">History</a></li>
	<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
</nav>
</body>
</html>