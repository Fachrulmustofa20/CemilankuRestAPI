<?php
	include "koneksi_ip.php"
?>
<HTML>
<HEAD>
<TITLE>Menampilkan Daftar Barang</TITLE>

<script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus barang ini ?")) {
	return true;
} else {
	return false;
}
}
</script>
</HEAD>
<BODY>
<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Masters</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index_admin.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Produk</li>						  	
					</ol>
				</div>
			</div>     
			<div class="row">
			<div class="col-md-3">
			<a class="btn btn-primary" href="<?php echo "index_admin.php?page=tambahbarang"?>"><i class="icon_plus_alt2"></i> Tambah</a>
			</div>
			</div>         
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Daftar Produk
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Id Produk</th>
                                 <th><i class="icon_mail_alt"></i> Nama Produk</th>
                                 <th><i class="icon_pin_alt"></i> Harga</th>
                                 <th><i class="icon_mobile"></i> Gambar</th>
								 <th><i class="icon_calendar"></i> Deskripsi</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>



<?php
    $query = "SELECT * FROM produk order by id_produk";
  $sql = mysqli_query ($conn,$query);
  //echo "<a href='tambahbarang.php'>Add</a>";
 	while ($hasil = mysqli_fetch_array ($sql)) {
		$id = $hasil['id_produk'];
		$nama = stripslashes ($hasil['nama']);
		$harga = stripslashes ($hasil['harga']);
		$gambar = $hasil['gambar'];
		$deskripsi = $hasil['deskripsi'];
	//tampilkan barang
		echo "<tr>
		<td align='center'>$id</td>
		<td align='left' >$nama</td>
		<td align='left'>$harga</td>
		<td align='left'>$gambar</td>
		<td align='lfet'>$deskripsi</td>";
		?>
		<td>
		                          <div class="btn-group">
                                      <a class="btn btn-success" href="<?php echo "index_admin.php?page=editbarang&id_produk=$id"?>"><i class="icon_check_alt2"></i> Edit</a>
                                      <a class="btn btn-danger" onClick='return tanya()' href="<?php echo "index_admin.php?page=hapusbarang&id_produk=$id"?>"><i class="icon_close_alt2"></i> Hapus</a>
                                  </div>
                                  </td>
                              </tr>
	        <?php } ?>
		</tbody>
                        </table>
                      </section>
                  </div>
              </div>
		
		
</BODY>
</HTML>
