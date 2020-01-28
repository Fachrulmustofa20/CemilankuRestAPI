<?php
include_once('../koneksi.php');
$username =$_POST['username'];
$total=$_POST['subtotal'];
$pembayaran=$_POST['pembayaran'];
$kembalian=$_POST['kembalian'];
$tanggal=date("Y-m-d");
$insert = "INSERT INTO penjualan(username,tanggal,subtotal,bayar,kembali) VALUES('$username','$tanggal','$total','$pembayaran','$kembalian')";
$exeinsert = mysqli_query($con,$insert);
$response = array();
if($exeinsert)
{
$response['code'] =1;
$response['message'] = "Success ! Cetak Nota";
}
else
{
$response['code'] =0;
$response['message'] = "Failed ! Nota Gagal dicetak";
}
echo json_encode($response);

?>