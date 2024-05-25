<?php 

    include "koneksi.php";
    session_start();
    $id = $_GET['id'];

    if(isset($_POST['beli'])) {
        $total_beli = $_POST['total'];

        $user = $_SESSION['username'];
        $sql_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user'");
        $data_user = mysqli_fetch_assoc($sql_user);
        $id_user = $data_user['id'];

        $sql_insert = "INSERT INTO tb_transaksi(id_user,id_barang,total_harga_transaksi) VALUES ('$id_user','$id','$total_beli')";
        $query = mysqli_query($koneksi,$sql_insert);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Pembayaran Produk</title>
</head>
<body>
    <nav>
		<a href="home_user.php">Home</a>
	 	<a href="list_barang_user.php">Tabel Barang</a>
	 	<a href="history.php">History</a></li>
		<a href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
    </nav>
    <?php 
        $id = $_GET['id'];
        $query = "SELECT * FROM barang WHERE id_barang='$id'";
        $sql = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($sql);
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" hidden name="id" value="<?php echo $data['id_barang'] ?>">
        <input type="text" hidden name="gambar" value="<?php echo $data['gmb_barang'] ?>">
        <table>
            <tr>
                <td>Merk :</td>
                <td><input type="text" name="merk" disabled value="<?php echo $data['merk_barang'] ?>"></td>
            </tr>
            <tr>
                <td>tipe barang :</td>
                <td><textarea disabled="" cols="30" rows="5"><?php echo $data['tipe_barang'] ?></textarea></td>
            </tr>
            <tr>
                <td>Harga :</td>
                <td><input type="text" name="harga" id="harga" disabled value="<?php echo $data['harga_barang'] ?>"></td>
            <tr>
                <td>Jumlah Produk :</td>
                <td><input type="text" name="jumlah_produk" id="jumlah_produk" onkeyup="hitunghargatotal()"></td>
            </tr>
            <tr>
                <td>Total Harga :</td>
                <td><input type="text" readonly name="total" id="total"></td>
            </tr>
            <tr>
                <td><input type="submit" name="beli" value="Beli"></td>
            </tr>
        </table>
    </form>
        <br><br><a href="list_barang_user.php">Back</a>
</body>
</html>

<script>
        function hitunghargatotal() {
            var harga = document.getElementById('harga');
            //var stock = document.getElementById('stock');
            var jumlahproduk = document.getElementById('jumlah_produk');
            var total = document.getElementById('total');

            if(jumlahproduk.value == '') {
                total.value = 0;
            //}
            //else if (parseInt(jumlahproduk.value) > parseInt(stock.value)) {
                //alert('Jumlah Barang Tidak Boleh Lebih Dari Stok');
                //jumlahproduk.value = 1;
                //total.value = parseInt(harga.value) * 1;
            }else {
                total.value = parseInt(harga.value) * parseInt(jumlahproduk.value);
            }
        };
    </script>