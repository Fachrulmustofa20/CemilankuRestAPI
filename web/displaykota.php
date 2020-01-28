<?php
	include "koneksi_ip.php"
?>
<HTML>
<HEAD>
<TITLE>Menampilkan Daftar Kota</TITLE>

<script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus kota ini ?")) {
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
						<li><i class="fa fa-laptop"></i>Pelanggan</li>						  	
					</ol>
				</div>
			</div>   
			<div class="row">
			<div class="col-md-3">
			
			<a class="btn btn-primary" href="<?php echo "index_admin.php?page=tambahkota"?>"><i class="icon_plus_alt2"></i> Tambah</a>
			</div>
			</div>           
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Daftar Pelanggan
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> No</th>
								 <th><i class="icon_profile"></i> Username</th>
                                 <th><i class="icon_pin_alt"></i> Password</th>             
								 <th><i class="icon_cogs"></i> Action</th>
                              </tr>



<?php
    $query = "SELECT * FROM pelanggan order by username";
  $sql = mysqli_query ($conn,$query);
  //echo "<a href='tambahkota.php'>Add</a>";
  $no=0;
 	while ($hasil = mysqli_fetch_array ($sql)) {
		$username = $hasil['username'];
		$password = stripslashes ($hasil['password']);
		$no++;
		echo "<tr>
		<td align='center'>$no</td>
		<td align='left'>$username</td>
		<td align='left' >$password</td>";
		?>
		<td>
		                          <div class="btn-group">
                                      <a class="btn btn-success" href="<?php echo "index_admin.php?page=editkota&username=$username"?>"><i class="icon_check_alt2"></i> Edit</a>
                                      <a class="btn btn-danger" onClick='return tanya()' href="<?php echo "index_admin.php?page=hapuskota&username=$username"?>"><i class="icon_close_alt2"></i> Hapus</a>
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
