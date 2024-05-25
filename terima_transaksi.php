<?php
include "koneksi.php";

$id = $_GET['terima'];

$sql = mysqli_query($koneksi, "UPDATE tb_transaksi SET status_transaksi='1' WHERE id_transaksi = '$id'");
if ($sql) {
    echo '<script>alert("Transaksi Berhasil Disetujui")</script>';
    echo '<meta http-equiv="refresh" content="1;url=home_admin.php">';
}
?>