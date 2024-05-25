<?php 
	include('koneksi.php');
    if(isset($_POST['submit'])){
        $merk_barang=$_POST['merk'];
        $tipe_barang=$_POST['tipe'];
        $harga_barang=$_POST['harga'];
        $gmb_barang=$_FILES['gambar']['tmp_name'];
        $namagambar = $_FILES['gambar']['name'];
        $file = 'C:\xampp\htdocs\ecommerce\gmbarang\\'.$namagambar;

        $sql = "INSERT into barang (merk_barang,tipe_barang,harga_barang,gmb_barang) VALUES ('$merk_barang','$tipe_barang','$harga_barang','$namagambar')";

        if (move_uploaded_file($gmb_barang, $file)) {
		$query=mysqli_query($koneksi,$sql);
		echo '<script>alert("Input Berhasil")</script>';
        echo '<meta http-equiv="refresh" content="1, url=list_barang_admin.php">';
		}
		else{
		echo "eror";
		}
    }
	?>