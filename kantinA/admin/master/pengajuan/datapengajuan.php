<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Pengajuan</h4>
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
						<a href="#">Pengajuan</a>
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
								<table id="add-row" class="display table table-striped table-hover">
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
										$query = mysqli_query($conn, 'SELECT * from waitingroom');
										while ($pengajuanbarang = mysqli_fetch_array($query)) {
										?>

											<tr>
												<td>
													<?php echo $pengajuanbarang['id_waiting'] ?>
												</td>
												<td>
													<?php echo $pengajuanbarang['namabarang'] ?>
												</td>
												<td>
													<?php echo $pengajuanbarang['jenisbarang'] ?>
												</td>
												<td>
													<?php echo $pengajuanbarang['sku'] ?>
												</td>
												<td>
													<?php echo $pengajuanbarang['namasupplier'] ?>
												</td>
												<td>
													<?php echo $pengajuanbarang['harga'] ?>
												</td>
												<td>

													<?php if ($pengajuanbarang['status'] == 'menunggu') { ?>
														<div class="badge badge-warning"><?php echo $pengajuanbarang['status'] ?></div>
													<?php } elseif ($pengajuanbarang['status'] == 'disetujui') { ?>
														<div class="badge badge-success"><?php echo $pengajuanbarang['status'] ?></div>
													<?php } else { ?>
														<div class="badge badge-danger"><?php echo $pengajuanbarang['status'] ?></div>
													<?php } ?>
												</td>

												<td>
													<form method="POST">
														<input type="hidden" name="id_waiting" value="<?php echo $pengajuanbarang['id_waiting']; ?>">
														<input type="hidden" name="namabarang" value="<?php echo $pengajuanbarang['namabarang']; ?>">
														<input type="hidden" name="jenisbarang" value="<?php echo $pengajuanbarang['jenisbarang']; ?>">
														<input type="hidden" name="sku" value="<?php echo $pengajuanbarang['sku']; ?>">
														<input type="hidden" name="namasupplier" value="<?php echo $pengajuanbarang['namasupplier']; ?>">
														<input type="hidden" name="harga" value="<?php echo $pengajuanbarang['harga']; ?>">
														<button type="Accept" name="accept" class="btn btn-xs btn-success"><i class="fa fa-check-square-o"></i></button>
														<button type="Decline" name="decline" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i></button>
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

<!-- MODAL ACCEPT -->

<!-- MODAL DECLINE -->

<?php
if (isset($_POST['accept'])) {
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
		echo "<meta http-equiv='refresh' content=0; URL=?view=databarang>";
	} else {
		// Cek apakah jenis barang sudah ada di tabel jenisbarang
		$resultCheckJenis = mysqli_query($conn, "SELECT * FROM jenisbarang WHERE jenisBarang = '$jenis_barang'");
		$rowCheckJenis = mysqli_fetch_assoc($resultCheckJenis);

		if ($rowCheckJenis) {
			// Jenis barang sudah ada, gunakan jenisBarang langsung
			$jenis_barang_query = $jenis_barang;
		} else {
			// Jenis barang belum ada, tambahkan ke tabel jenisbarang
			mysqli_query($conn, "INSERT INTO jenisbarang (jenisBarang, deskripsi) VALUES ('$jenis_barang', 'belum tersedia')");
			$jenis_barang_query = $jenis_barang;
		}

		// Update status ke 'disetujui' di tabel waitingroom
		mysqli_query($conn, "UPDATE waitingroom SET status='disetujui' WHERE id_waiting='$id_waiting'");

		// Insert ke tabel barang
		mysqli_query($conn, "INSERT INTO barang (namabarang, jenisbarang, sku, harga, namasupplier) VALUES ('$nama_barang', '$jenis_barang_query', '$sku', '$harga', '$namasupplier')");

		if ($rowCheckJenis) {
			echo "<script>alert('Data berhasil disimpan')</script>";
			echo "<script>window.location.replace('?view=datapengajuan');</script>";
		} else {
			echo "<script>alert('Data berhasil disimpan (jenis barang baru)')</script>";
			echo "<script>window.location.replace('?view=datapengajuan');</script>";
		}
	}
}
if (isset($_POST['decline'])) {
	$id_waiting = $_POST['id_waiting'];
	$nama_barang = $_POST['namabarang'];
	$jenis_barang = $_POST['jenisbarang'];
	$sku = $_POST['sku'];
	$namasupplier = $_POST['namasupplier'];
	$harga = $_POST['harga'];

	// Remove the entry from the waitingroom table
	mysqli_query($conn, "DELETE FROM waitingroom WHERE id_waiting = $id_waiting");

	echo "<script>alert ('Data Berhasil Ditolak')</script>";
	echo "<meta http-equiv='refresh' content=0; URL=?view=datapengajuan>";
}







?>