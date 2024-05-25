<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <?php 
  include ('koneksi.php');
  $id = $_GET['id'];
  $query_mysql = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id'")or die(mysql_error());
  $nomor = 1;
  while($data = mysqli_fetch_array($query_mysql)){
  ?>
<h1>Halaman Edit</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id_barang']?>">
   <table cellspacing="0px" cellpadding="2px">
    <tr>
      <td>Merk</td>
      <td value="<?php echo $data['merk_barang'] ?>">
        <select name="merk">
        <option <?php if ($data['merk_barang']=='Acer'){echo "selected";} ?> value="Acer">Acer</option>
        <option <?php if ($data['merk_barang']=='Asus'){echo "selected";} ?> value="Asus">Asus</option>
        <option <?php if ($data['merk_barang']=='BenQ'){echo "selected";} ?> value="BenQ">BenQ</option>
        <option <?php if ($data['merk_barang']=='Dell'){echo "selected";} ?> value="Dell">Dell</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Tipe:</td>
      <td><input type="text" name="tipe" value= "<?php echo $data['tipe_barang']?>"></td>
    </tr>
    <tr>
      <td>Harga:</td>
      <td><input type="text" name="harga" value= "<?php echo $data['harga_barang']?>"></td>
    </tr>
    <tr>
      <td>Gambar</td>
        <td>
          <input type="text" hidden name="gambarawal" value="<?php echo $data['gmb_barang'] ?>">
          <input type="file" name="gambarbaru">
        </td>
    </tr>
   </table>
  <input type="submit" name="submit" value="Submit"><br><br>
  </form>
    </div>
<?php }?>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id'");
$data = mysqli_fetch_assoc($sql);

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $merk_barang=$_POST['merk'];
  $tipe_barang=$_POST['tipe'];
  $harga_barang=$_POST['harga'];
  $gambarawal = $_POST['gambarawal'];
  $gambarbaru = $_FILES['gambarbaru']['name'];
  $tmp_gambar = $_FILES['gambarbaru']['tmp_name'];
 

  if (empty($gambarbaru)) {
    $gambar1 = $gambarawal;
    echo "gambar lama";
    $query = "UPDATE `barang` SET `gmb_barang`='$gambar1',`merk_barang`='$merk_barang',`tipe_barang`='$tipe_barang',`harga_barang`='$harga_barang' WHERE id_barang='$id'";
    $update = mysqli_query($koneksi, $query);

    header('location: list_barang_admin.php');
  }else{
    $gambar2 = date('dmYHis').$gambarbaru;
    $lokasigambar = 'gmbarang/'.$gambar2;
    if (move_uploaded_file($tmp_gambar, $lokasigambar)) {
      $query = "UPDATE `barang` SET `gmb_barang`='$gambar2',`merk_barang`='$merk_barang',`tipe_barang`='$tipe_barang',`harga_barang`='$harga_barang' WHERE id_barang='$id'";
    $update = mysqli_query($koneksi, $query);
      if ($update) {
        header('location: list_barang_admin.php');
      }else{
        echo "Data gambar diupdate";  
      }
    }else{
      echo "gambar gagal diupdate";
    }
  }
}

?>
</body>
</html>