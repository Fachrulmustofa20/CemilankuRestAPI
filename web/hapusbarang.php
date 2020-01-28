<?php
include "koneksi_ip.php";
if (isset($_GET['id_produk'])) {
$id = $_GET['id_produk'];
} else {
die ("Error. NO Id Selected! ");
}
?>
<html>
<head><title>Delete Produk</title>
</head>
<body>

<?php
//proses delete produk
if (!empty($id) && $id != "") {
$getdata = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk ='$id'");
$row = mysqli_fetch_array($getdata);
$query = "DELETE FROM produk WHERE id_produk='$id'";
$sql = mysqli_query ($conn,$query);
if ($sql) {
echo "<h2><font color=blue>Produk telah berhasil dihapus</font></h2>";
if(is_file("../upload/produk/$row[gambar]")) {
	unlink("../upload/produk/$row[gambar]");
}
} else {
echo "<h2><font color=red>Produk gagal dihapus</font></h2>";
}
echo "Klik <a href='index_admin.php?page=displayproduk'>di sini</a> untuk kembali ke halaman display produk";
} else {
die ("Access Denied");
}
?>
</body>
</html>