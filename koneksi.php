<?php 
$koneksi = mysqli_connect("localhost","root","","ecommerce");
 
if (mysqli_connect_errno()){
	echo "Gagal : " . mysqli_connect_error();
}
 
?>