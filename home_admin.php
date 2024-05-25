<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
<?php 
	session_start();

	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "user") {
			header("location: home_user.php");
		}
	} else {
		header("location: index.php");
	}

	?>
	<title>Home Admin</title>
</head>
<body>
<nav>
	<a href="home_admin.php">Home</a>
 	<a href="list_barang_admin.php">Tabel Barang</a>
	<a href="daftar_transaksi_admin.php">History</a></li>
	<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
</nav>
</body>
</html>