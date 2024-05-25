<?php
include "koneksi.php";

$id = $_GET['tolak'];

$sql = mysqli_query($koneksi, "UPDATE tb_transaksi SET status_transaksi='2' WHERE id_transaksi = '$id'");
if ($sql) {
    echo '<script>alert("Transaksi Berhasil Ditolak")</script>';
    echo '<meta http-equiv="refresh" content="1;url=home_admin.php">';
}
?>