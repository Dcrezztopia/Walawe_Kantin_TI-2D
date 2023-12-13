<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Jenis Barang</h4>
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
						<a href="#">Jenis Barang</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Jenis Barang</h4>
								<a href="?view=createjenisbarang" class="btn btn-primary btn-round ml-auto">
									<i class="fa fa-plus"></i>
									Tambah Data
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Jenis Barang</th>
											<th>Deskripsi</th>
											<th>Action</th>

										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT * FROM jenisbarang');
										while ($jenis = mysqli_fetch_array($query)) {
											?>

											<tr>
												<td>
													<?php echo $no++ ?>
												</td>
												<td>
													<?php echo $jenis['jenisBarang'] ?>
												</td>
												<td>
													<?php echo $jenis['deskripsi'] ?>
												</td>

												<td>
													<a href="?view=detailjenisbarang" data-toggle="modal" title="Detail"
														class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
													<a href="?view=editjenisbarang" title="Edit"
														class="btn btn-xs btn-warning">
														<i class="fa fa-edit"></i></a>
													<a href="#modalHapusBarang<?php echo $jenis['jenisBarang'] ?>"
														data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i
															class="fa fa-trash"></i></a>
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

<div class="modal fade" id="modalHapusBarang<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Hapus</span>
					<span class="fw-light">
						Barang
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
					<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i>
						Close</button>
				</div>
			</form>
		</div>
	</div>


	<?php

	if (isset($_POST['hapus'])) {
		$id = $_POST['id'];
		$id_ruangan = $_POST['id_ruangan'];

		$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
		$sto = mysqli_fetch_array($selSto);
		$sisa = 'free';

		mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");
		mysqli_query($conn, "DELETE from pinjamruangan where id='$id'");
		echo "<script>alert ('Data Berhasil Dihapus') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";

	}
	?>