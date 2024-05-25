<?php 
	include('koneksi.php');
    if(isset($_POST['submit'])){
        $merk_barang=$_POST['merk'];
        $tipe_barang=$_POST['tipe'];
        $harga_barang=$_POST['harga'];
        $gmb_barang=$_FILES['gambar']['name'];
        $tmp_gambar =$_FILES['gambar']['tmp_name'];
        $nama_gambar = date('dmYHis').' - '.$gmb_barang;
        $file = 'C:\xampp\htdocs\ecommerce\gmbarang\\'.$nama_gambar;

        $sql = "INSERT into barang (merk_barang,tipe_barang,harga_barang,gmb_barang) VALUES ('$merk_barang','$tipe_barang','$harga_barang','$nama_gambar')";

        if (move_uploaded_file($tmp_gambar, $file)) {
		$query=mysqli_query($koneksi,$sql);
		echo '<script>alert("Input Berhasil")</script>';
        echo '<meta http-equiv="refresh" content="1, url=list_barang_admin.php">';
		}
		else{
		echo "eror";
		}
    }
	?>
