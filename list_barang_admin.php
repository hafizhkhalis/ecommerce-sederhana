<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="css/style.css">
<head>
<?php 
	session_start();

	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "user") {
			header("location: list_barang_user.php");
		}
	} else {
		header("location: index.php");
	}

	?>
 

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
		<a href="home_admin.php">Home</a>
		<a href="list_barang_admin.php">Tabel Barang</a>
		<a href="history.php">History</a></li>
		<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
	</nav>
	<h1>Halaman Input</h1>
 	<form action="cek_pageadmin.php" method="post" enctype="multipart/form-data">
	 <table cellspacing="0px" cellpadding="2px">
	 	<tr>
	 		<td>Merk</td>
	 		<td>
	 			<select name="merk">
	 			<option>Acer</option>
	 			<option>Asus</option>
	 			<option>BenQ</option>
	 			<option>Dell</option>
	 			</select>
	 		</td>
	 	</tr>
	 	<tr>
	 		<td>Tipe:</td>
	 		<td><input type="text" name="tipe"></td>
	 	</tr>
	 	<tr>
	 		<td>Harga:</td>
	 		<td><input type="text" name="harga"></td>
	 	</tr>
	 	<tr>
	 		<td>Gambar:</td>
	 		<td><input type="file" name="gambar"></td>
	 	</tr>
	 </table>
	<input type="submit" name="submit" value="Submit"><br><br>
	</form>

<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
		<tr id="th">
			<td>Code</td>
			<td>Merk</td>
			<td>Tipe</td>
			<td>Harga</td>
			<td>Gambar</td>
			<td>Aksi</td>
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
 		<td>
 			<a href="edit.php?id=<?php echo $data ['id_barang'];?>">Edit</a>|
 			<a href="hapus.php?id=<?php echo $data['id_barang']; ?>">Delete</a>
 	</tr>
 <?php } ?>
	</table>
	<br>

<a id="a" href="cek_logout.php">Logout</a>

</body>
</html>