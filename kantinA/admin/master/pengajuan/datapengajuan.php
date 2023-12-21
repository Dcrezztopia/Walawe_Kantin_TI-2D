<?php
include 'crudDataPengajuan.php';

$crudDataPengajuan = new crudDataPengajuan($conn);
?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Pengajuan Barang</h4>
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
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>ID Waiting</th>
											<th>Nama Barang</th>
											<th>Jenis Barang</th>
											<th>Harga</th>
											<th>SKU</th>
											<th>Nama Supplier</th>
											<th>Gambar</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT * from waitingroom');
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
												<td>Rp<?php echo number_format($pinjamruangan['harga'], 0, ',', '.'); ?></td>

												<td>
													<img src="../img/<?php echo $pinjamruangan['gambar'] ?>" alt="Gambar Barang" class="gambar-barang">
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
													<form method="POST" enctype="multipart/form-data">
														<input type="hidden" name="id_waiting" value="<?php echo $pinjamruangan['id_waiting']; ?>">
														<input type="hidden" name="namaBarang" value="<?php echo $pinjamruangan['namabarang']; ?>">
														<input type="hidden" name="jenisBarang" value="<?php echo $pinjamruangan['jenisbarang']; ?>">
														<input type="hidden" name="sku" value="<?php echo $pinjamruangan['sku']; ?>">
														<input type="hidden" name="namaSupplier" value="<?php echo $pinjamruangan['namasupplier']; ?>">
														<input type="hidden" name="harga" value="<?php echo $pinjamruangan['harga']; ?>">
														<input type="hidden" name="gambar" value="<?php echo $pinjamruangan['gambar']; ?>">
														<button type="Accept" title="Terima" name="simpan" class="btn btn-xs btn-success"><i class="fa fa-check-square-o"></i></button>
														<button type="Decline" title="Tolak" name="tolak" class="btn btn-xs btn-warning"><i class="fa fa-times-circle"></i></button>
														<button type="Delete" title="Hapus" name="hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>

														<!-- <button type="button" title="Terima" name="simpan" data-toggle="modal" data-target="#acceptPengajuan" class="btn btn-xs btn-success">
															<i class="fa fa-check-square-o"></i>
														</button>

														<button type="button" title="Tolak" name="tolak" data-toggle="modal" data-target="#declinePengajuan" class="btn btn-xs btn-warning"><i class="fa fa-times-circle"></i></button>
														<button type="button" title="Hapus" name="hapus" data-toggle="modal" data-target="#deletePengajuan" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button> -->
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

<!-- ACCEPT -->
<div class="modal fade" id="acceptPengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Terima</span>
					<span class="fw-light">Pengajuan Barang</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				<h4>Apakah Anda Ingin Menyetujui Barang Ini?</h4>
			</div>
			<div class="modal-footer no-bd">
				<button class="btn btn-success" type="button" data-dismiss="modal"><i class="fa fa-check-square-o"></i>&nbsp;Accept</button>
				<button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</button>

			</div>
		</div>
	</div>
</div>

<!-- DECLINE -->
<div class="modal fade" id="declinePengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Tolak</span>
					<span class="fw-light">Pengajuan Barang</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				<h4>Apakah Anda Ingin Menolak Barang Ini?</h4>
			</div>
			<div class="modal-footer no-bd">
				<button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;Decline</button>
				<button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</button>

			</div>
		</div>
	</div>
</div>

<!-- DELETE -->
<div class="modal fade" id="deletePengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Hapus</span>
					<span class="fw-light">Pengajuan Barang</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				<h4>Apakah Anda Menghapus Barang Ini?</h4>
			</div>
			<div class="modal-footer no-bd">
				<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-trash"></i>&nbsp;Delete</button>
				<button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</button>

			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$data = array(
		'id_waiting' => $_POST['id_waiting'],
		'namaBarang' => $_POST['namaBarang'],
		'jenisBarang' => $_POST['jenisBarang'],
		'sku' => $_POST['sku'],
		'namaSupplier' => $_POST['namaSupplier'],  // Menggunakan $_POST untuk gambar lama
		'harga' => $_POST['harga'],
		'gambar' => $_POST['gambar']
	);
	$crudDataPengajuan->Create($data);
} elseif (isset($_POST['hapus'])) {
	$data = array(
		'id_waiting' => $_POST['id_waiting'],
	);
	$crudDataPengajuan->Delete($data);
} elseif (isset($_POST['tolak'])) {
	$data = array(
		'id_waiting' => $_POST['id_waiting']
	);
	$crudDataPengajuan->Decline($data);
}





?>