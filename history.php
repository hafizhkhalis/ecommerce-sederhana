<?php 
	include "koneksi.php";

	session_start();

	if (isset($_SESSION['level'])) {
		if ($_SESSION['level'] == "admin") {
			header("location: daftar_transaksi_admin.php");
		}
	} else {
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<title>Riwayat Pembelian</title>
</head>
<body>

	<nav>
		<a href="home_user.php">Home</a>
		<a href="list_barang_user.php">Tabel Barang</a>
		<a href="history.php">History</a></li>
		<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
	</nav>

	<table border="1" cellpadding="20">
		<thead>
			<tr>
				<th>#</th>
				<th>Merk</th>
				<th>Tipe Barang</th>
				<th>Nama Pembeli</th>
				<th>Total Harga</th>
				<th>Status</th>
			</tr>
		</thead>
	
	<tbody>
		<?php 

		$no = 1;
		$sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi A JOIN user B ON A.id_user=B.id JOIN barang C ON A.id_barang=C.id_barang");
		while ($data = mysqli_fetch_assoc($sql)) :

		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['merk_barang'] ?></td>
			<td><?= $data['tipe_barang'] ?></td>
			<td><?= $data['username'] ?></td>
			<td>Rp. <?= number_format($data['total_harga_transaksi']); ?></td>
			<?php if($data['status_transaksi'] == '0') : ?>
				<td>Menunggu Persetujuan</td>
			<?php elseif($data['status_transaksi'] == '2') : ?>
				<td>Ditolak</td>
			<?php else : ?>
				<td>Berhasil Dibeli</td>
			<?php endif; ?>
		</tr>
	<?php endwhile; ?>
	</tbody>
	</table>
</body>
</html>