<?php
include "koneksi_ip.php";
if (isset($_GET['username'])) {
$username = $_GET['username'];
} else {
die ("Error. No Id Selected! ");
}
$query = "SELECT * FROM pelanggan WHERE username='$username'";
$sql = mysqli_query ($conn,$query);
$hasil = mysqli_fetch_array ($sql);
$username = $hasil['username'];
$password = $hasil['password'];

//proses edit kota
if (isset($_POST['Edit'])) {
	$password = $_POST['password'];
	
//update kota
$query = "UPDATE pelanggan SET password='$password' WHERE username='$username'";
$sql = mysqli_query ($conn,$query);
if ($sql) {
	echo "<h2><font color=blue>kota telah berhasil diedit</font></h2>";
} else {
	echo "<h2><font color=red>kota gagal diedit</font></h2>";
}
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaykota'>";
}
if (isset($_POST['Reset'])) {
echo "<meta http-equiv='refresh' content='0;URL=index_admin.php?page=displaykota'>";
}
?>
<html>
<head><title>Edit Kota</title>
</head>
<body>
<FORM ACTION="" METHOD="POST" NAME="input">
<table cellpadding="0" cellspacing="0" border="0" width="700">
<tr>
<td align="center" colspan="2"><h2>Update Pelanggan</h2></td>
</tr>
<tr>
<td width="200">Password</td>
<td>: <input type="text" name="password" size="30" value="<?php echo $password ?>"</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;
<input type="hidden" name="hidkota" value="<?=$username?>">
<input type="submit" name="Edit" value="Edit password">&nbsp;
<input type="submit" name="Reset" value="Cancel"></td>
</tr>
</table>
</FORM>
</body>
</html>