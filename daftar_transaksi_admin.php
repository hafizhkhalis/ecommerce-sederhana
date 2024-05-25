<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Transaksi</title>
</head>
<body>
    <nav>
		<a href="home_admin.php">Home</a>
		<a href="list_barang_admin.php">Tabel Barang</a>
		<a href="daftar_transaksi_admin.php">History</a></li>
		<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
	</nav>
    <?php if (isset($_SESSION['customer']) || isset($_SESSION['admin'])) : ?>
        <a href="login/logout.php">Logout</a>
    <?php endif; ?>
    <br><br>
    <table border="1" cellpadding="20">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Pemilik</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi A JOIN user B ON A.id_user=B.id JOIN barang C ON A.id_barang=C.id_barang WHERE status_transaksi='0'");
            while ($data = mysqli_fetch_assoc($sql)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['merk_barang'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td>Rp. <?= number_format($data['total_harga_transaksi']); ?></td>
                    <td>
                        <form action="terima_transaksi.php" method="post">
                            <a href="terima_transaksi.php?terima=<?= $data['id_transaksi']; ?>">Terima</a>
                        </form><br><br>
                        <form action="tolak_transaksi.php" method="post">
                            <a href="tolak_transaksi.php?tolak=<?= $data['id_transaksi']; ?>">Tolak</a>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>