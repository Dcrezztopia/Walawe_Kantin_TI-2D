<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Kantin</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Pengajuan Barang</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Pengajuan Barang</h4>
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Id Waiting</th>
													<th>Nama Barang</th>
													<th>Jenis Barang</th>
													<th>SKU </th>
													<th>Nama Supplier</th>
													<th>Harga</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * from waitingroom');
													while ($pinjamruangan = mysqli_fetch_array($query)) {
														?>
														
											<tr>
													 <td>
														<?php echo $pinjamruangan['id_waiting'] ?>
													</td>
													<td>
														<?php echo $pinjamruangan['namabarang'] ?>
													</td>
													<td>
														<?php echo $pinjamruangan['jenisbarang'] ?>
													</td>
													<td>
														<?php echo $pinjamruangan['sku'] ?>
													</td>
													<td>
														<?php echo $pinjamruangan['namasupplier'] ?>
													</td>
													<td>
														<?php echo $pinjamruangan['harga'] ?>
													</td>
													<td>
														
														<?php if ($pinjamruangan['status'] == 'menunggu') { ?>
                                                            <div class="badge badge-warning"><?php echo $pinjamruangan['status'] ?></div>
															<?php } elseif ($pinjamruangan['status'] == 'disetujui') { ?>
																<div class="badge badge-success"><?php echo $pinjamruangan['status'] ?></div>
																<?php } else { ?>
																	<div class="badge badge-danger"><?php echo $pinjamruangan['status'] ?></div>
																	<?php } ?>
																</td>
																
																<td>
																	<form method="POST">
																		<input type="hidden" name="id_waiting" value="<?php echo $pinjamruangan['id_waiting']; ?>">
																		<input type="hidden" name="namabarang" value="<?php echo $pinjamruangan['namabarang']; ?>">
																		<input type="hidden" name="jenisbarang" value="<?php echo $pinjamruangan['jenisbarang']; ?>">
																		<input type="hidden" name="sku" value="<?php echo $pinjamruangan['sku']; ?>">
																		<input type="hidden" name="namasupplier" value="<?php echo $pinjamruangan['namasupplier']; ?>">
																		<input type="hidden" name="harga" value="<?php echo $pinjamruangan['harga']; ?>">
																		<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Accept </button>
																		<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
																	</form>
																</td>
											    </tr>
															<?php } ?>
														</tbody>
													
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
if (isset($_POST['simpan'])) {

    $id_waiting = $_POST['id_waiting'];
    $nama_barang = $_POST['namabarang'];
    $jenis_barang = $_POST['jenisbarang'];
    $sku = $_POST['sku'];
    $namasupplier = $_POST['namasupplier'];
    $harga = $_POST['harga'];

    
	
    // Check if the status is 'disetujui'
    $result = mysqli_query($conn, "SELECT status FROM waitingroom WHERE id_waiting='$id_waiting'");
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
	
    if ($status === 'disetujui') {
		echo "<script>alert('Barang telah disetujui')</script>";
    } else {
	  mysqli_query($conn,"UPDATE waitingroom SET status='disetujui' WHERE id_waiting='$id_waiting'");
      mysqli_query($conn, "INSERT INTO supplier (namaSupplier) VALUES ('$namasupplier')");
	  $idSupplier_query = "SELECT idSupplier FROM supplier WHERE namaSupplier = '$namasupplier'";
	  $result = mysqli_query($conn, $idSupplier_query);
	  $row = mysqli_fetch_assoc($result);
	  $idSupplier = $row['idSupplier'];
	  mysqli_query($conn,"INSERT into barang values ('','$nama_barang','$jenis_barang','0','$harga','$sku', '$idSupplier')");
	  echo "<script>alert('Data berhasil disimpan')</script>";
    }
    echo "<meta http-equiv='refresh' content=0; URL=?view=databarang>";
}


elseif(isset($_POST['hapus']))
{
    $id_waiting = $_POST['id_waiting'];
    $nama_barang = $_POST['namabarang'];
    $jenis_barang = $_POST['jenisbarang'];
    $sku = $_POST['sku'];
    $namasupplier = $_POST['namasupplier'];
    $harga = $_POST['harga'];

		
    mysqli_query($conn, "DELETE FROM waitingroom WHERE id_waiting = $id_waiting");
	echo "<script>alert ('Data Berhasil Dihapus') </script>";
	echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
}
?>