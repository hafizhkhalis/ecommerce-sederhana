<!DOCTYPE html>
<html>
<head>

<?php 
	session_start();

	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "admin") {
			header("location: list_barang_admin.php");
		}
	} else {
		header("location: index.php");
	}

	?>

    <link rel="stylesheet" href="css/style.css">
	<title>Selamat Datang <?php echo $_SESSION['level']; ?></title>
	<style>
		#tr:hover{
			background-color: #f5f5f5;
		}

		#th{
			background-color: #4CAF50;
			color: white;
		  	border-color: #4CAF50;
		}

		#a{
			color: #4CAF50;
			background-color: white;
			border-radius: 10px;
			border: 2px solid #4CAF50;
			padding: 7px 30px;
			cursor: pointer;
		}

		#a:hover{
			background-color: #4CAF50;
			color: white;
		}

	</style>
</head>
<body>
    <nav>
		<a href="home_user.php">Home</a>
	 	<a href="list_barang_user.php">Tabel Barang</a>
	 	<a href="history.php">History</a></li>
		<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
    </nav>
	<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
		<tr id="th">
			<td>Code</td>
			<td>Merk</td>
			<td>Tipe</td>
			<td>Harga</td>
			<td>Gambar</td>
			<td>Beli</td>
		</tr>

<?php 
	include 'koneksi.php';

	$sql = "select * from barang";
	$query = mysqli_query($koneksi, $sql)
			or die ("query simpan salah:".mysqli_connect_error());
	$no = 0;

	while ($data = mysqli_fetch_array($query)){
		$no++;
	
 ?>

 	<tr id="tr">
 		<td><?php echo $no; ?></td>
 		<td><?php echo $data['merk_barang']; ?></td>
 		<td><?php echo $data['tipe_barang']; ?></td>
 		<td><?php echo $data['harga_barang']; ?></td>
 		<td><img style=" width: 150px; height: 150px;" src="gmbarang/<?php echo $data['gmb_barang']; ?>"></td>
 		<td><a href="transaksi.php?id=<?php echo $data['id_barang']; ?>">Transaksi</a></td>
 	</tr>
 <?php } ?>
	</table>
	<br>

<a id="a" href="cek_logout.php">Logout</a>
</body>
</html>