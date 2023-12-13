<?php
include 'crudJenisBarang.php';
$crudJenisBarang = new CrudJenisBarang($conn);
?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Tambah</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="?view=dashboard">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="?view=datajenisbarang">Jenis Barang</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Tambah Jenis Barang</a>
					</li>
				</ul>
			</div>

			<!-- TAMBAH JENIS BARANG -->

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Jenis Barang
								<a href="?view=datapengajuan">
									<button button type="button" class="close" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</a>
							</div>
						</div>

						<form method="POST" action="" enctype="multipart/form-data">
							<div class="form-group col-md-4 ml-3 mt-2">
								<label>Jenis Barang</label>
								<input type="text" id="jenis_barang" name="jenis_barang" class="form-control"
									placeholder="Roti" required>
							</div>

							<div class="form-group col-md-4 ml-3 mb-3">
								<label>Deskripsi</label>
								<textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Roti"
									rows="8" required></textarea>
							</div>

							<div class="card-action">
								<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>
									Save</button>
								<a href="?view=datajenisbarang" class="btn btn-danger"><i class="fa fa-times"></i>
									Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$data = array('jenis_barang' => $_POST['jenis_barang'],
		'deksripsi' => $_POST['deksripsi']);

	$crudJenisBarang->Create($data);
}

?>