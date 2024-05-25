<?php 
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM `barang` where id_barang='$id'");

header("location:list_barang_admin.php");

?>