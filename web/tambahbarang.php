<?php
include "koneksi_ip.php";
//proses input produk
if (isset($_POST['Edit'])) {
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	//gambar
	$now = DateTime::createFromFormat('U.u',microtime(true)); 
	$id = $now->format('YmdHisu');

	$ekstensi_diperbolehkan	= array('png','jpg','jpeg','jpe','bmp','rle','dib');
	$gambar = $_FILES['file']['name'];
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$namagambar = $id.'.'.$ekstensi;
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];

	//insert produk
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 10485760){ // ukuran max 10mb			
			move_uploaded_file($file_tmp, '../upload/produk/'.$namagambar);
			$query = "INSERT INTO produk values('$kode','$nama','$harga','$namagambar','$deskripsi')";
			$sql = mysqli_query ($conn,$query);
			if ($sql) {
				echo "<h2><font color=blue>produk telah berhasil ditambahkan</font></h2>";
			} else {
				echo "<h2><font color=red>produk gagal ditambahkan</font></h2>";
			}
		}else{
			echo 'UKURAN FILE TERLALU BESAR';
		}
	}else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	}
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displayproduk'>";
}
if (isset($_POST['Reset'])) {
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displayproduk'>";
}
?>
<html>
<head><title>Tambah Produk</title>
</head>
<body>
<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="700">
<tr>
<td align="center" colspan="2"><h2>Input produk</h2></td>
</tr>
<tr>
<td>Nama Produk</td>
<td>: <input type="text" name="nama" size="10" value=""></td>
</tr>
<tr>
<td>Harga</td>
<td>: <input type="number" name="harga" size="10" value=""></td>
</tr>
<tr>
<td>Deskripsi</td>
<td>: <input type="text" name="deskripsi" size="50" value=""></td>
</tr>
<tr>
<td>Gambar</td>
<td><input type="file" name="file"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;

<input type="submit" name="Edit" value="Tambah Produk">&nbsp;
<input type="submit" name="Reset" value="Cancel"></td>
</tr>
</table>
</FORM>
</body>
</html>