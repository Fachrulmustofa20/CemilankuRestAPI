<?php
include "koneksi_ip.php";
if (isset($_GET['id_produk'])) {
$id = $_GET['id_produk'];
} else {
die ("Error. No Id Selected! ");
}
//ambil data
$query = "SELECT * FROM produk WHERE id_produk='$id'";
$sql = mysqli_query ($conn,$query);
$hasil = mysqli_fetch_array ($sql);
$nama = $hasil['nama'];
$harga = $hasil['harga'];
$deskripsi = $hasil['deskripsi'];
$gambar = $hasil['gambar'];
$deletegambar = '../upload/produk/'.$gambar;

//proses edit produk
if (isset($_POST['Edit'])) {
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$gambar = $_FILES['file']['name'];
	$ukuran	= $_FILES['file']['size'];

	//update produk
	if ($ukuran == 0) {
		$query = "UPDATE produk SET nama='$nama',harga='$harga', deskripsi='$deskripsi' WHERE id_produk='$id'";
		$sql = mysqli_query ($conn,$query);
		if ($sql) {				
			echo "<h2><font color=blue>produk telah berhasil diedit</font></h2>";
		} else {
			echo "<h2><font color=red>produk gagal diedit</font></h2>";
		}
	}
	else {
		//gambar
		$now = DateTime::createFromFormat('U.u',microtime(true)); 
		$id = $now->format('YmdHisu');

		$ekstensi_diperbolehkan	= array('png','jpg','jpeg','jpe','bmp','rle','dib');
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$namagambar = $id.'.'.$ekstensi;
		$file_tmp = $_FILES['file']['tmp_name'];

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 10485760){ // ukuran max 10mb			
				move_uploaded_file($file_tmp, '../upload/produk/'.$namagambar);
				$query = "UPDATE produk SET nama='$nama',harga='$harga',gambar='$namagambar', deskripsi='$deskripsi' WHERE id_produk='$produk'";
				$sql = mysqli_query ($conn,$query);
				if ($sql) {
					if(is_file($deletegambar)) {
						unlink($deletegambar);
					}
					echo "<h2><font color=blue>produk telah berhasil diedit</font></h2>";
				} else {
					echo "<h2><font color=red>produk gagal diedit</font></h2>";
				}
			}else{
				echo 'UKURAN FILE TERLALU BESAR';
			}
		}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displayproduk'>";
}
if (isset($_POST['Reset'])) {
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displayproduk'>";
}
?>
<html>
<head><title>Edit Barang</title>
</head>
<body>
<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="700">
<tr>
<td align="center" colspan="2"><h2>Update produk</h2></td>
</tr>
<tr>
<tr>
<td>Nama produk</td>
<td>: <input type="text" name="nama" size="10" value="<?php echo $nama ?>"></td>
</tr>
<tr>
<td>Harga</td>
<td>: <input type="number" name="harga" size="10" value="<?php echo $harga ?>"></td>
</tr>
<tr>
<td>Deskripsi</td>
<td>: <input type="text" name="deskripsi" size="50" value="<?php echo $deskripsi?>"></td>
</tr>
<tr>
	<td></td>
	<td><img width='200' height='200' src='../upload/produk/<?php echo $gambar?>'></td>
</tr>
<tr>
<td>Gambar</td>
<td><input type="file" name="file"></td>
</tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;
<input type="hidden" name="hidbarang" value="<?=$id?>">
<input type="submit" name="Edit" value="Edit Barang">&nbsp;
<input type="submit" name="Reset" value="Cancel"></td>
</tr>
</table>
</FORM>
</body>
</html>