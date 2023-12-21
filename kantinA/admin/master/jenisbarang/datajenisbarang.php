<?php
include 'crudDataJenisBarang.php';

$crudDataJenisBarang = new crudDataJenisBarang($conn);
?>
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
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>
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
										$query = mysqli_query($conn, 'SELECT * from jenisbarang');
										while ($barang = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $barang['jenisBarang'] ?></td>
												<td><?php echo $barang['deskripsi'] ?></td>
												<td>
													<a href="#modalDetailBarang<?php echo $barang['jenisBarang'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
													<a href="#modalEditBarang<?php echo $barang['jenisBarang'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
													<a href="#modalHapusBarang<?php echo $barang['jenisBarang'] ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

<!-- CREATE -->
<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Tambah</span>
					<span class="fw-light">
						Jenis Barang
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Jenis Barang</label>
						<input type="text" name="jenisBarang" class="form-control" placeholder="Jenis Barang" required="" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="8" required autocomplete="off"></textarea>
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
$p = mysqli_query($conn, 'SELECT * from jenisbarang');
while ($d = mysqli_fetch_array($p)) {
?>

	<!-- UPDATE -->
	<div class="modal fade" id="modalEditBarang<?php echo $d['jenisBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Edit</span>
						<span class="fw-light">
							Jenis Barang
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $d['jenisBarang'] ?>">
						<div class="form-group">
							<label>Jenis Barang</label>
							<input value="<?php echo $d['jenisBarang'] ?>" type="text" name="jenisBarangBaru" class="form-control" placeholder="Jenis Barang ..." required="">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea name="deskripsi" class="form-control" rows="8" placeholder="Deskripsi ..." required=""><?php echo $d['deskripsi']; ?></textarea>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
$c = mysqli_query($conn, 'SELECT * from jenisbarang');
while ($row = mysqli_fetch_array($c)) {
?>
	<!-- DELETE -->
	<div class="modal fade" id="modalHapusBarang<?php echo $row['jenisBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Hapus</span>
						<span class="fw-light">
							Jenis Barang
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="jenisBarang" value="<?php echo $row['jenisBarang'] ?>">
						<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
$q = mysqli_query($conn, 'SELECT * FROM jenisbarang');

while ($k = mysqli_fetch_array($q)) {
?>
	<!-- READ -->
	<div class="modal fade" id="modalDetailBarang<?php echo $k['jenisBarang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Detail</span>
						<span class="fw-light">
							Jenis Barang
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $k['jenisBarang'] ?>">
						<div class="form-group">
							<label>Jenis Barang</label>
							<input readonly value="<?php echo $k['jenisBarang'] ?>" type="text" name="jenisBarang" class="form-control" placeholder="Jenis Barang ..." required="">
						</div>
						<div class="form-group">
							<label>Deskripsi </label>
							<textarea readonly name="deskripsi" class="form-control" placeholder="Deskripsi" rows="8" required=""><?php echo $k['deskripsi']; ?></textarea>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
if (isset($_POST['simpan'])) {
	$data = array(
		'jenisBarang' => $_POST['jenisBarang'],
		'deskripsi' => $_POST['deskripsi']
	);
	$crudDataJenisBarang->Create($data);
} elseif (isset($_POST['ubah'])) {
	$data = array(
		'id' => $_POST['id'],
		'deskripsi' => $_POST['deskripsi'],
		'jenisBarangBaru' => $_POST['jenisBarangBaru']
	);
	$crudDataJenisBarang->Update($data);
} elseif (isset($_POST['hapus'])) {
	$data = array(
		'jenisBarang' => $_POST['jenisBarang']
	);
	$crudDataJenisBarang->Delete($data);
}
?>